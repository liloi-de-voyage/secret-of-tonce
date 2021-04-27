#!/usr/bin/php
<?php

$download = [
  'secret-of-tonce.pdf' => 'http://docs.google.com/document/d/1L99lFRkNkQFMfErKJEHjzoVOVEF9G2xR5nLfEtK96AA/export?format=pdf',
  'secret-of-tonce.docx' => 'http://docs.google.com/document/d/1L99lFRkNkQFMfErKJEHjzoVOVEF9G2xR5nLfEtK96AA/export?format=docx',
  'secret-of-tonce.txt' => 'http://docs.google.com/document/d/1L99lFRkNkQFMfErKJEHjzoVOVEF9G2xR5nLfEtK96AA/export?format=txt',
  'secret-of-tonce.epub' => 'http://docs.google.com/document/d/1L99lFRkNkQFMfErKJEHjzoVOVEF9G2xR5nLfEtK96AA/export?format=epub',
];

foreach ($download as $filename => $link) {
  $fullFileName = __DIR__ . '/' . $filename;
  shell_exec(sprintf('wget "%s" -O "%s"', $link, $fullFileName));
}