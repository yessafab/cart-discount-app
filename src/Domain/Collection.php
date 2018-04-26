<?php

/**
 * Collection
 */
class Collection
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $itemsWithoutKey = [];
        foreach ($items as $item) {
            $itemsWithoutKey[] = $item;
        }

        $this->items = $itemsWithoutKey;
    }

    /**
     * Number of objects.
     *
     * @return int
     */
    public function count()
    {
        return count($this->getItems());
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }
}