<?php

// LogDTO.php

namespace App\Services;

class LogDTO {
    private string $logFilepath;
    private ?string $searchDate;
    private ?string $searchHour;
    private array $keywords;

    public function getLogFilepath(): string {
        return $this->logFilepath;
    }

    public function setLogFilepath(string $logFilepath): void {
        $this->logFilepath = $logFilepath;
    }

    public function getSearchDate(): ?string {
        return $this->searchDate;
    }

    public function setSearchDate(?string $searchDate): void {
        $this->searchDate = $searchDate;
    }

    public function getSearchHour(): ?string {
        return $this->searchHour;
    }

    public function setSearchHour(?string $searchHour): void {
        $this->searchHour = $searchHour;
    }

    public function getKeywords(): array {
        return $this->keywords;
    }

    public function setKeywords(array $keywords): void {
        $this->keywords = $keywords;
    }
}
