<?php
/**
 * Created by iKNSA.
 * Author: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 09/12/16
 * Time: 17:54
 */

namespace Romenys\Logger\Entity;

use Romenys\Helpers\GetEnvironmentByHostName;

class Logs
{
    const DEFAULT_ENV = 'PROD';

    const DEFAULT_PATH = 'var/logs/';

    const DEFAULT_FILE = 'romenys.log';

    const FORMAT_TXT = 'txt';
    const FORMAT_PHP_ARRAY = 'array';
    const FORMAT_JSON = 'json';

    private $id;

    private $data;

    private $path;

    private $file;

    private $format;

    private $environment;

    public function __construct($environment = null, $path = null, $file = null, $format = null)
    {
        is_null($environment) ? $this->setEnvironment() : $environment;
        is_null($path) ? self::DEFAULT_PATH : $path;
        is_null($file) ? self::DEFAULT_FILE : $file;
        is_null($format) ? self::FORMAT_TXT : $format;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Logs
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param mixed $environment
     * @return Logs
     */
    public function setEnvironment($environment)
    {
        if ($environment === null) {
            $env = new GetEnvironmentByHostName();
            $environment = $env->getEnv();
        }

        is_null($environment) ? $environment = self::DEFAULT_ENV : $environment;

        $this->environment = $environment;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     * @return Logs
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     * @return Logs
     */
    public function setFile($file)
    {
        is_null($file) ? strtolower($this->getEnvironment()) . '.' . $this->getFormat();

        $this->file = $file;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     * @return Logs
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }
}
