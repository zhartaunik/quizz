<?php

declare(strict_types=1);

namespace App\Model\Block;

class Renderer
{
    /**
     * @param string $template
     * @param string[] $params
     * @return void
     * @throws NoTemplateException
     */
    public function render(string $template, array $params = []): void
    {
        extract($params);
        $templatePath = __DIR__ . '/../../View/' . $template;
        if (!file_exists($templatePath)) {
            throw new NoTemplateException('Template does not exist');
        }

        ob_start();
        include ($templatePath);
        echo ob_get_clean();
    }
}