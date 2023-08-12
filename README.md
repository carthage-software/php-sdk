## Carthage SDK for PHP


## Installation 🚀

Install the SDK using Composer with the following command:

```bash
composer require carthage/php-sdk guzzlehttp/guzzle
```

## Usage 💼

### Creating a Client

```php
use GuzzleHttp\Client as GuzzleClient;
use Carthage\Sdk\Client;

$client = Client::create(new GuzzleClient([
    'base_uri' => 'https://my-carthage-server.example.com',
]));

$pingResource = $client->ping();

echo "Server is up and running!\n";
echo "Server Time: {$pingResource->getTime()->format('Y-m-d H:i:s')}\n";
echo "Quote: {$pingResource->getQuote()}\n";
```

### Examples

Refer to the [`examples`](./examples) directory for more examples.

## Code Of Conduct 🤝

Our community is guided by a Code of Conduct, and we expect all contributors to respect it. See the [`CODE_OF_CONDUCT`](./CODE_OF_CONDUCT.md) for more details.

## Contributing 🎁

The Carthage SDK for PHP thrives on contributions from the open-source community. We value every contribution, no matter how small.

## License 📜

The Carthage SDK for PHP is distributed under the MIT License. See [`LICENSE`](./LICENSE) for more information.

---

We hope you enjoy using the Carthage SDK for PHP! For any queries or suggestions, don't hesitate to open an issue or submit a pull request. Happy coding!
