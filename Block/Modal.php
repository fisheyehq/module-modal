<?php
/**
 * Copyright © Fisheye Media Ltd. All rights reserved.
 * See LICENCE.txt for licence details.
 */
namespace Fisheye\Modal\Block;

use Magento\Framework\View\Element\Template;

class Modal extends Template
{
    /**
     * @throws \Exception
     */
    public function getChildHtml($alias = '', $useCache = true)
    {
        $childHtml = parent::getChildHtml($alias, $useCache);
        if (is_null($childHtml) || $childHtml == '') {
            throw new \Exception(__('At least one child block must be passed via layout for the modal content.'));
        }
        return $childHtml;
    }

    /**
     * @throws \Exception
     */
    public function getLinkText(): string
    {
        $linkText = $this->getData('linkText');
        if (is_null($linkText)) {
            throw new \Exception(__('linkText must be passed as an argument via layout in order to trigger the modal.'));
        }
        if (!is_string($linkText)) {
            throw new \Exception(__('linkText argument must be a string.'));
        }
        return $this->escapeHtml($linkText);
    }

    public function getLinkClass(): string
    {
        return $this->escapeHtmlAttr($this->getData('linkClass'));
    }

    public function getModalConfig(): string
    {
        return json_encode([
            'autoOpen' => $this->shouldModalAutoOpen(),
            'buttonClass' => $this->getModalButtonClass(),
            'buttonText' => $this->getModalButtonText(),
            'displayButton' => $this->displayModalButton(),
            'clickableOverlay' => $this->isModalOverlayClickable(),
            'focus' => $this->getModalFocus(),
            'innerScroll' => $this->shouldModalHaveInnerScroll(),
            'modalClass' => $this->getModalClass(),
            'modalLeftMargin' => $this->getModalLeftMargin(),
            'responsive' => $this->isModalResponsive(),
            'title' => $this->getModalTitle(),
            'type' => $this->getModalType()
        ]);
    }

    private function shouldModalAutoOpen(): bool
    {
        return $this->getData('autoOpen') ? $this->getData('autoOpen') : false;
    }

    private function getModalButtonClass(): string
    {
        return $this->escapeHtmlAttr($this->getData('buttonClass'));
    }

    private function displayModalButton(): bool
    {
        return $this->getData('displayButton') ? $this->getData('displayButton') : false;
    }

    private function getModalButtonText(): string
    {
        return $this->getData('buttonText') ?
            $this->escapeHtml($this->getData('buttonText')) : $this->escapeHtml(__('Close'));
    }

    private function isModalOverlayClickable(): bool
    {
        $clickableOverlay = $this->getData('clickableOverlay');
        if ($clickableOverlay || $clickableOverlay === false || $clickableOverlay === 0) {
            return $clickableOverlay;
        }
        return true;
    }

    private function getModalFocus(): string
    {
        return $this->getData('focus') ? $this->getData('focus') : '[data-role="closeBtn"]';
    }

    private function shouldModalHaveInnerScroll(): bool
    {
        return $this->getData('innerScroll') ? $this->getData('innerScroll') : false;
    }

    private function getModalClass(): string
    {
        return $this->escapeHtmlAttr($this->getData('modalClass'));
    }

    private function getModalLeftMargin(): int
    {
        return $this->getData('modalLeftMargin') ? $this->getData('modalLeftMargin') : 45;
    }

    private function isModalResponsive(): bool
    {
        return $this->getData('responsive') ? $this->getData('responsive') : false;
    }

    private function getModalTitle(): string
    {
        return $this->getData('title') ? $this->escapeHtml($this->getData('title')): '';
    }

    /**
     * @throws \Exception
     */
    private function getModalType(): string
    {
        $type = strtolower($this->getData('type'));
        if ($type === 'popup' || $type === 'slide') {
            return $type;
        }
        if (is_null($type)) {
            return 'popup';
        }
        throw new \Exception(__('Modal type must be either \'popup\' or \'slide\'.'));
    }
}
