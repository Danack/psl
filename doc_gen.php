<?php

declare(strict_types = 1);


$contents = <<< MD
# Documentation

This doc contains a list of the functions. Please click through to the individual functions to read the docblock comment details for each of them.
    
# Function list

goes here.
MD;


file_put_contents(__DIR__ . "/docs/index.md", $contents);