<?php

declare(strict_types=1);

namespace App\Controller;

final class HomeController
{
    public function __construct(private readonly string $templatePath)
    {
    }

    /**
     * @return array{status:int, content:string}
     */
    public function index(): array
    {
        ob_start();
        require $this->templatePath . '/home/index.php';
        $content = (string) ob_get_clean();

        return [
            'status' => 200,
            'content' => $content,
        ];
    }
}
