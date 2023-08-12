<?php

declare(strict_types=1);

use Carthage\Sdk\Client;
use Carthage\Sdk\Model\LogManagementLogCollectPostBody;
use Carthage\Sdk\Model\LogManagementLogCollectPostBodyEntriesItem;
use Carthage\Sdk\Model\LogManagementLogCollectPostBodyLog;

/** @var Client $client */
$client = require 'bootstrap.php';

$logCollectPostBodyLog = new LogManagementLogCollectPostBodyLog();
$logCollectPostBodyLog->setNamespace('events');
$logCollectPostBodyLog->setLevel(100);
$logCollectPostBodyLog->setTemplate('Event {event} was dispatched.');

$logCollectPostBodyEntriesItem1 = new LogManagementLogCollectPostBodyEntriesItem();
$logCollectPostBodyEntriesItem1->setSource(gethostname());
$logCollectPostBodyEntriesItem1->setContext(['event' => 'App\Event\SomeEvent']);
$logCollectPostBodyEntriesItem1->setAttributes(['attribute' => 'value']);
$logCollectPostBodyEntriesItem1->setTags(['tag1', 'tag2']);
$logCollectPostBodyEntriesItem1->setOccurredAt(new DateTime('2020-01-01T00:00:00+00:00'));

$logCollectPostBodyEntriesItem2 = new LogManagementLogCollectPostBodyEntriesItem();
$logCollectPostBodyEntriesItem2->setSource(gethostname());
$logCollectPostBodyEntriesItem2->setContext(['event' => 'App\Event\SomeOtherEvent']);
$logCollectPostBodyEntriesItem2->setAttributes(['attribute' => 'value']);
$logCollectPostBodyEntriesItem2->setTags(['tag1', 'tag2', 'tag3']);
$logCollectPostBodyEntriesItem2->setOccurredAt(new DateTime('2020-01-01T00:00:00+00:00'));

$logCollectPostBody = new LogManagementLogCollectPostBody();
$logCollectPostBody->setLog($logCollectPostBodyLog);
$logCollectPostBody->setEntries([$logCollectPostBodyEntriesItem1, $logCollectPostBodyEntriesItem2]);

$client->logManagementCollectLog(
    $logCollectPostBody
);

echo "Log was sent!\n";
