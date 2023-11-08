<?php

// LogSearchService.php

namespace App\Services;

use SplFileObject;

class LogSearchService {
    public function searchLog(LogDTO $logDTO): array {
        $filteredLogEntries = [];

        $logFile = new SplFileObject($logDTO->getLogFilepath(), 'r');

        while (!$logFile->eof()) {
            $line = $logFile->fgets();

            preg_match('/\[(.*?)\]/', $line, $dateMatches);
            preg_match('/\d{2}:(\d{2}):\d{2}/', $line, $hourMatches);

            if (!empty($dateMatches) && !empty($hourMatches)) {
                $logDate = date('Y-m-d', strtotime($dateMatches[1]));
                $logHour = $hourMatches[1];

                $matchesDate = ($logDTO->getSearchDate() === null || $logDate === $logDTO->getSearchDate());
                $matchesHour = ($logDTO->getSearchHour() === null || $logHour == $logDTO->getSearchHour());
                $matchesKeywords = true;

                foreach ($logDTO->getKeywords() as $keyword) {
                    if (strpos($line, $keyword) === false) {
                        $matchesKeywords = false;
                        break;
                    }
                }

                if ($matchesDate && $matchesHour && $matchesKeywords) {
                    $filteredLogEntries[] = $line;
                }
            }
        }

        return $filteredLogEntries;
    }
}

