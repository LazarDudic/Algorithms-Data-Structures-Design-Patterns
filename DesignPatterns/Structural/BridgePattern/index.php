<?php

interface Formatter
{
    public function format(string $text): string;
}

class EscapedTextFormatter implements Formatter
{
    public function format(string $text): string
    {
        return htmlspecialchars($text)."\n";
    }
}

class JsonFormatter implements Formatter
{
    public function format(string $text): string
    {
        return json_encode($text)."\n";
    }
}

class HtmlFormatter implements Formatter
{
    public function format(string $text): string
    {
        return sprintf('<p>%s</p>', $text)."\n";
    }
}

abstract class Service
{
    protected Formatter $implementation;
    public function __construct(Formatter $implementation)
    {
        $this->implementation = $implementation;
    }

    final public function setImplementation(Formatter $printer)
    {
        $this->implementation = $printer;
    }

    abstract public function get(): string;
}

class HelloWorldService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('Hello World');
    }
}

class BridgeService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('bridge');
    }
}

$service = new HelloWorldService(new EscapedTextFormatter());
echo $service->get();

$service = new HelloWorldService(new HtmlFormatter());
echo $service->get();

$service = new HelloWorldService(new JsonFormatter());
echo $service->get();

$service = new BridgeService(new EscapedTextFormatter());
echo $service->get();

$service = new BridgeService(new HtmlFormatter());
echo $service->get();