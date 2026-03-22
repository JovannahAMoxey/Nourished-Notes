<?php
declare(strict_types=1);

function getDailyQuoteFromMongo(): array
{
    $mongoPassword = "YOUR_MONGO_PASSWORD";
    $mongoUser = "u24";
    $dbName = "u24";
    $collName = "quotes";

    try {
        $manager = new MongoDB\Driver\Manager(
            "mongodb://127.0.0.1:27017",
            [
                "username"   => $mongoUser,
                "password"   => $mongoPassword,
                "authSource" => "u24"
            ]
        );

        $countCmd = new MongoDB\Driver\Command([
            "count" => $collName
        ]);

        $countRes = $manager->executeCommand($dbName, $countCmd)->toArray();
        $total = (int)($countRes[0]->n ?? 0);

        if ($total <= 0) {
            return [
                "adjective" => "EMPTY",
                "quote" => "No quotes found in database.",
                "author" => "System"
            ];
        }

        $seed = (int)date("Ymd");
        $index = $seed % $total;

        $query = new MongoDB\Driver\Query([], [
            "skip" => $index,
            "limit" => 1
        ]);

        $cursor = $manager->executeQuery("$dbName.$collName", $query);
        $docs = $cursor->toArray();
        $doc = $docs[0] ?? null;

        if ($doc === null) {
            return [
                "adjective" => "OOPS",
                "quote" => "Could not fetch quote.",
                "author" => "System"
            ];
        }

        return [
            "adjective" => (string)($doc->adjective ?? ""),
            "quote"     => (string)($doc->quote ?? ""),
            "author"    => (string)($doc->author ?? "")
        ];
    } catch (\Throwable $e) {
        return [
            "adjective" => "ERROR",
            "quote" => "Mongo login failed.",
            "author" => "System"
        ];
    }
}