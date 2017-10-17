<?php

namespace Inchoo\Sample05\Block;

class Hello extends \Magento\Framework\View\Element\Template
{
    /**
     * @return string
     */
    public function getHelloWorld()
    {
        return 'Hello World :]';
    }
}