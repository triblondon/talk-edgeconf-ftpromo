<?php

$aFiles = array();

foreach (new DirectoryIterator('./media') as $fileInfo) {
    if (!$fileInfo->isFile()) {
        continue;
    }

    $aFile = array();

    switch (strtoupper($fileInfo->getExtension())) {
        case 'JPG':
            $aFile['filename'] = $fileInfo->getFilename();
            $aFile['background'] = 'black';
            $aFile['type'] = 'image';
            break;
        case 'MP4':
            $aFile['filename'] = $fileInfo->getFilename();
            $aFile['background'] = 'white';
            $aFile['type'] = 'video';
            break;
    }

    if (count($aFile) < 1) {
        continue;
    }

    if (
        ($aFile['filename'] === 'video3.mp4') ||
        ($aFile['filename'] === 'video4.mp4')
    ) {
        $aFile['background'] = 'black';
    }

    $aFiles[] = $aFile;
}

// Add FT quotes.

$aFile = array();
$aFile['filename'] = '<div class="content"><blockquote>UK\'s <strong>most ethical</strong> newspaper</blockquote><cite>--Carnegie Trust, 2012</cite></div>';
$aFile['background-image'] = 'url(backgrounds/financial_times_st_bernard.jpg)';
$aFile['type'] = 'quote';

$aFiles[] = $aFile;

$aFile = array();
$aFile['filename'] = '<div class="content"><blockquote>Join the FT\'s award-winning development team<br/><strong style="color:#ff0">labs.ft.com/jobs</strong></cite></div>';
$aFile['background-image'] = 'url(backgrounds/blue-orange-yellow.jpg)';
$aFile['type'] = 'quote';

$aFiles[] = $aFile;

$aFile = array();
$aFile['filename'] = '<div class="content"><blockquote>Highest paid daily readership in <strong>126 years</strong></blockquote></div>';
$aFile['background-image'] = 'url(backgrounds/oldpaper.jpg)';
$aFile['type'] = 'quote';

$aFiles[] = $aFile;

// TODO Implement some algorithm to define the order of slides.

echo json_encode($aFiles, JSON_PRETTY_PRINT);