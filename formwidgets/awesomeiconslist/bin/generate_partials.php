<?php

/**
 * @param string $fileName
 * @param string $unicodeOptionsRegular
 * @param string $unicodeOptionsSolid
 * @param string $unicodeOptionsBrands
 */
function writePartial(string $fileName, string $unicodeOptionsRegular, string $unicodeOptionsSolid, string $unicodeOptionsBrands)
{
    $options = <<<OPTIONS
<optgroup label="Regular">$unicodeOptionsRegular</optgroup>
<optgroup label="Solid">$unicodeOptionsSolid</optgroup>
<optgroup label="Brands">$unicodeOptionsBrands</optgroup>
OPTIONS;

    if (file_put_contents("../partials/$fileName", $options) === false) {
        echo "Failed to write options to the $fileName\n";
        exit(1);
    }

    echo "Options were written successfully to the $fileName\n";
}

$icons = file_get_contents("https://raw.githubusercontent.com/FortAwesome/Font-Awesome/master/metadata/icons.yml");

if (empty($icons)) {
    echo "Failed to load metadata file\n";
    exit(1);
}

if (!function_exists('yaml_parse')) {
    echo "Please install and enable yaml extension\n";
    exit(1);
}

if (($parsed = yaml_parse($icons)) === false) {
    echo "Failed to parse metadata file\n";
    exit(1);
}

$optionTemplate = "<option data-icon='%s awesome-icon-item' value='%s'>%s</option>";

$unicodeOptionsRegular = "";
$unicodeOptionsSolid = "";
$unicodeOptionsBrands = "";

$classOptionsRegular = "";
$classOptionsSolid = "";
$classOptionsBrands = "";

$count = 0;

foreach ($parsed as $iconName => $iconData) {
    if (empty($iconData['styles'])) {
        continue;
    }

    if (empty($iconData['label'])) {
        continue;
    }

    if (empty($iconData['unicode'])) {
        continue;
    }

    $label = ucwords($iconData['label']);

    foreach ($iconData['styles'] as $style) {
        if ($style === 'regular') {
            $count++;
            $unicodeOptionsRegular .= sprintf($optionTemplate, "far fa-$iconName", "&#x" . $iconData['unicode'], $label);
            $classOptionsRegular .= sprintf($optionTemplate, "far fa-$iconName", "far fa-$iconName", $label);
        }

        if ($style === 'solid') {
            $count++;
            $unicodeOptionsSolid .= sprintf($optionTemplate, "fas fa-$iconName", "&#x" . $iconData['unicode'], $label);
            $classOptionsSolid .= sprintf($optionTemplate, "fas fa-$iconName", "fas fa-$iconName", $label);
        }

        if ($style === 'brands') {
            $count++;
            $unicodeOptionsBrands .= sprintf($optionTemplate, "fab fa-$iconName","&#x" . $iconData['unicode'], $label);
            $classOptionsBrands .= sprintf($optionTemplate, "fab fa-$iconName", "fab fa-$iconName", $label);
        }
    }
}

echo "Icons discovered: $count\n";

writePartial("_unicodeoptions.htm", $unicodeOptionsRegular, $unicodeOptionsSolid, $unicodeOptionsBrands);
writePartial("_classoptions.htm", $classOptionsRegular, $classOptionsSolid, $classOptionsBrands);
