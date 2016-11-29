<?php declare (strict_types = 1);
namespace SmoothPhp\LaravelPapertrailEventBusLogger;

use Illuminate\Contracts\Config\Repository;
use SmoothPhp\Contracts\Domain\DomainMessage;
use SmoothPhp\Contracts\EventBus\EventListener;

/**
 * Class PapertrailEventLogger
 * @package SmoothPhp\LaravelPapertrailEventBusLogger
 * @author Simon Bennett <simon@bennett.im>
 */
final class PapertrailEventLogger implements EventListener
{
    /**
     * @var string
     */
    protected $papertrailHost;
    /**
     * @var int
     */
    protected $papertrailPort;
    /**
     * @var string
     */
    protected $papertrailAppName;
    /** @var Repository */
    private $config;

    /**
     * PapertrailEventLogger constructor.
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->papertrailHost = $this->config->get('service.papertrail.host');
        $this->papertrailPort = $this->config->get('services.papertrail.port');
        $this->papertrailAppName = $this->config->get('services.papertrail.app_name');

    }

    /**
     * @param DomainMessage $domainMessage
     * @return void
     */
    public function handle(DomainMessage $domainMessage)
    {
        $name = explode('.', $domainMessage->getType());
        $name = preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', end($name));
        $this->sendToPapertrail(trim(ucwords($name)) . " ({$domainMessage->getType()})");

    }

    /**
     * @param $message
     * @see https://gist.github.com/troy/2220679
     */
    private function sendToPapertrail($message)
    {
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        foreach (explode("\n", $message) as $line) {
            $syslogMessage = "<22>" . date('M d H:i:s ') . ' ' . $this->papertrailAppName . ': ' . $line;
            socket_sendto(
                $sock,
                $syslogMessage,
                strlen($syslogMessage),
                0,
                $this->papertrailHost,
                $this->papertrailPort
            );
        }
        socket_close($sock);
    }
}
