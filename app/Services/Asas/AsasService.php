<?php

namespace App\Services\Asas;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\CustomersRequest;
use GuzzleHttp\Exception\ClientException;
use App\Http\Resources\AssasPaymentResource;
use App\Http\Requests\PaymentCustomerRequest;
use App\Http\Resources\AssasCustomerResource;
use App\Http\Requests\PaymentCreditCardRequest;
use App\Http\Resources\AsaasPaymentCreditResource;
use App\Repositories\Customer\Contract\CustomerRepositoryContract;
use App\Repositories\Payment\Contract\PaymentRepositoryContract;
use App\Services\Asas\Contract\AsasServiceContract;

class AsasService implements AsasServiceContract
{
    /**
     * Cliente GuzzleHttp Instance
     *
     * @var Cliente
     */
    protected $client;
    protected $urlAsas;
    protected $token;
    protected CustomerRepositoryContract $customerRepository;
    protected PaymentRepositoryContract $paymentRepository;

    /**
     * AsasService Contructor
     *
     */
    public function __construct(CustomerRepositoryContract $customerRepositoryContract, PaymentRepositoryContract $paymentRepositoryContract)
    {
        $this->client = new Client();
        $this->urlAsas = env('ASSAS_API_SANDBOX');
        $this->token = env('ASSAS_TOKEN_SANDBOX');
        $this->customerRepository = $customerRepositoryContract;
        $this->paymentRepository = $paymentRepositoryContract;
    }

    /**
     * @param CustomersRequest $request
     *
     * @return mixed
     */
    public function createCustomer(CustomersRequest $request): mixed
    {
        if (!$this->customerRepository->validateCustomer($request)) {
            return response()->json('usuario ja cadastro na base de dados', 200);
        }
        $customerData = json_decode($this->getApiAsaas('/customers', 'POST', $request));
        $customer = new AssasCustomerResource($customerData);
        $this->customerRepository->createCustomer($customer);
        return response()->json('usuario cadastrado com sucesso!', 200);
    }

    /**
     * Creating a payment via Pix/Boleto
     * @param PaymentCustomerRequest $request
     *
     * @return mixed
     */
    public function createPayment(PaymentCustomerRequest $request): mixed
    {
        //criar a chave pix para poder realizar pagamentos
        $this->createKeyPix();
        $paymentData = json_decode($this->getApiAsaas('/payments', 'POST', $request));

        if (isset($paymentData->errors)) {
            return response()->json($paymentData, 400);
        }
        $payment = new AssasPaymentResource($paymentData);
        $this->paymentRepository->createPayment($payment);
        return $payment;
    }

    /**
     * Creating a payment via credit card.
     * @param PaymentCreditCardRequest $request
     *
     * @return mixed
     */
    public function createPaymentCredit(PaymentCreditCardRequest $request): mixed
    {
        $paymentData = json_decode($this->getApiAsaas('/payments', 'POST', $request));
        if (isset($paymentData->errors)) {
            return response()->json($paymentData, 400);
        }
        $payment = new AsaasPaymentCreditResource($paymentData);
        $this->paymentRepository->createPayment($payment);
        return $payment;
    }


    /**
     * @param string $urlType
     * @param Request $request
     *
     * @return mixed
     */
    private function getApiAsaas(string $urlType, string $methodType, $data = null): mixed
    {
        try {
            $url = $this->urlAsas . $urlType;

            $options = [
                'headers' => [
                    'accept' => 'application/json',
                    'access_token' => $this->token,
                    'content-type' => 'application/json',
                ],
            ];

            if ($data instanceof Request) {
                $options['body'] = json_encode($data->all());
                $options['headers']['content-type'] = 'application/json';
            } elseif (is_array($data)) {
                $options['body'] = json_encode($data);
                $options['headers']['content-type'] = 'application/json';
            } elseif (is_string($data)) {
                $options['body'] = $data;
            }

            $response = $this->client->request($methodType, $url, $options);
            return $response->getBody();
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();
        }
    }

    /**
     * generates the pix key on the asaas server so that I don't have to access it for no reason.
     * @return void
     */
    private function createKeyPix(): void
    {
        $pixData = json_decode($this->getApiAsaas('/pix/addressKeys?status=ACTIVE', 'GET'));
        if ($pixData->totalCount == 0) {
            $json = ["type" => "EVP"];
            $this->getApiAsaas('/pix/addressKeys', 'POST', $json);
        }
    }
}
