<?php

namespace FORM4\Form4Socialmedialinks\Domain\Model;

/*
* Copyright notice
*
* (c) 2016 form4 GmbH <typo3@form4.de>
* All rights reserved
*
* This file is part of the TYPO3 CMS project.
*
* It is free software; you can redistribute it and/or modify it under
* the terms of the GNU General Public License, either version 2
* of the License, or any later version.
*
* For the full copyright and license information, please read the
* LICENSE.txt file that was distributed with this source code.
*
* The TYPO3 project - inspiring people to share!
*/
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Link Entity
 */
class Link extends AbstractEntity
{
    #[Validate(['validator' => 'NotEmpty'])]
    protected string $title = '';

    #[Validate(['validator' => 'NotEmpty'])]
    protected string $identifier = '';

    #[Validate(['validator' => 'NotEmpty'])]
    protected int $type = 0;

    protected string $url = '';

    protected string $html = '';

    protected ?FileReference $icon = null;

    #[Validate(['validator' => 'NotEmpty'])]
    protected string $socialMediaIcon = '';

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getHtml(): string
    {
        return $this->html;
    }

    public function setHtml(string $html): void
    {
        $this->html = $html;
    }

    public function getIcon(): ?FileReference
    {
        return $this->icon;
    }

    public function setIcon(?FileReference $icon): void
    {
        $this->icon = $icon;
    }

    public function getSocialMediaIcon(): string
    {
        return $this->socialMediaIcon;
    }

    public function setSocialMediaIcon(string $socialMediaIcon): void
    {
        $this->socialMediaIcon = $socialMediaIcon;
    }
}
