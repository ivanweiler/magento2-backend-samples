<?php

namespace Inchoo\Sample04\Api\Data;

interface NewsInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const NEWS_ID       = 'news_id';
    const TITLE         = 'title';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle();

}
