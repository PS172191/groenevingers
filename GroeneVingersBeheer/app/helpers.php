<?php

if (! function_exists('generateSKU')) {
    /**
     * Generate a SKU code based on product name, category, and id.
     *
     * @param  string  $productName
     * @param  string  $categoryName
     * @param  int  $id
     * @return string
     */
    function generateSKU($productName, $categoryName, $id)
    {
        // Generate the first two letters of the product and categories

        $productPart = substr(strtoupper($productName), 0, 2);
        $categoryPart = substr(strtoupper($categoryName), 0, 2);

        // Makes sure to fill the gap with 0s until we have 15 characters.

        $idPart = str_pad($id, 11, '0', STR_PAD_LEFT);

        // Combine all parts to form the SKU
        return $productPart.$categoryPart.$idPart;
    }
}
