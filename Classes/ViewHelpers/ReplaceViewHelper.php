<?php

namespace FORM4\Form4Socialmedialinks\ViewHelpers;

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
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Exception;

/**
 * Replaces $search in $subject with $replace.
 *
 * <vh:replace
 *   search="{0: '###MARKER###', 1: '###OTHER###'}"
 *   replace="{0: 'my text', 1: 'other text'}"
 *   caseSensitive="1"
 * >
 *   text with ###MARKER###
 * </vh:replace>
 *
 * {'text with ###MARKER###' -> vh:replace(
 *   search : {0: '###MARKER###', 1: '###OTHER###'},
 *   replace: {0: 'my text', 1: 'other text'},
 *   caseSensitive: 1)
 * }
 */
class ReplaceViewHelper extends AbstractViewHelper
{
    /**
     * Initialize arguments.
     *
     * @api
     * @throws Exception
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('search', 'array', 'the needle', false, []);
        $this->registerArgument('replace', 'array', 'the replacement', false, []);
        $this->registerArgument('caseSensitive', 'boolean', 'case sensitive or not', false, true);
    }

    /**
     * Replaces $search in $subject with $replace.
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return mixed
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $subject = $arguments['subject'] ?? $renderChildrenClosure();
        $search = $arguments['search'];
        $replace = $arguments['replace'];
        $caseSensitive = $arguments['caseSensitive'];

        if ($subject === null) {
            $subject = $renderChildrenClosure();
        }
        $function = ($caseSensitive === true ? 'str_replace' : 'str_ireplace');

        $subject = $function($search, $replace, $subject);
        return $subject;
    }
}
