<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class PreviewAndDownload extends Field
{
    protected string $view = 'forms.components.preview-and-download';
    protected string $previewTextDisplay = "Preview";
    protected string $downloadTextDisplay = "Download";

    protected bool $showPreview = true;
    protected bool $showDownload = true;

    protected string $storageDisk = "public";

    public function previewText($text): static
    {
        $this->previewTextDisplay = $text;
        return $this;
    }

    public function getUrlPath(): string
    {
        return \Storage::disk($this->storageDisk)->url(collect($this->getState())->first());
    }

    public function getPreviewText(): string
    {
        return $this->previewTextDisplay;
    }

    public function getDownloadText(): string
    {
        return $this->downloadTextDisplay;
    }

    public function disk($disk): static
    {
        $this->storageDisk = $disk;
        return $this;
    }

    public function previewTextDisplay($text): static
    {
        $this->previewTextDisplay = $text;
        return $this;
    }

    public function downloadTextDisplay($text): static
    {
        $this->downloadTextDisplay = $text;
        return $this;
    }

    public function showPreview($show): static
    {
        $this->showPreview = $show;
        return $this;
    }

    public function showDownload($show): static
    {
        $this->showDownload = $show;
        return $this;
    }
}
