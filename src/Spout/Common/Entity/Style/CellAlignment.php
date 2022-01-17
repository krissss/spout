<?php

namespace Box\Spout\Common\Entity\Style;

/**
 * Class Alignment
 * This class provides constants to work with text alignment.
 */
abstract class CellAlignment
{
    public const LEFT = 'left';
    public const RIGHT = 'right';
    public const CENTER = 'center';
    public const JUSTIFY = 'justify';

    public const V_TOP = 'v-top';
    public const V_BOTTOM = 'v-right';
    public const V_CENTER = 'v-center';

    public const TOP_LEFT = 'top-left';
    public const TOP_RIGHT = 'top-right';
    public const TOP_CENTER = 'top-center';
    public const CENTER_LEFT = 'center-left';
    public const CENTER_RIGHT = 'center-right';
    public const CENTER_CENTER = 'center-center';
    public const BOTTOM_LEFT = 'bottom-left';
    public const BOTTOM_RIGHT = 'bottom-right';
    public const BOTTOM_CENTER = 'bottom-center';

    private static $VALID_ALIGNMENTS = [
        self::LEFT => 1,
        self::RIGHT => 1,
        self::CENTER => 1,
        self::JUSTIFY => 1,

        self::V_TOP => 1,
        self::V_BOTTOM => 1,
        self::V_CENTER => 1,

        self::TOP_LEFT => 1,
        self::TOP_RIGHT => 1,
        self::TOP_CENTER => 1,
        self::CENTER_LEFT => 1,
        self::CENTER_RIGHT => 1,
        self::CENTER_CENTER => 1,
        self::BOTTOM_LEFT => 1,
        self::BOTTOM_RIGHT => 1,
        self::BOTTOM_CENTER => 1,
    ];

    /**
     * @param string $cellAlignment
     *
     * @return bool Whether the given cell alignment is valid
     */
    public static function isValid($cellAlignment)
    {
        return isset(self::$VALID_ALIGNMENTS[$cellAlignment]);
    }

    /**
     * @param $cellAlignment
     * @return array [$horizontal, $vertical]
     */
    public static function parseAlignment($cellAlignment): array
    {
        $arr = explode('-', $cellAlignment);
        if (count($arr) === 1) {
            return [$arr[0], null];
        }
        if ($arr[0] === 'v') {
            return [null, $arr[1]];
        }
        return [$arr[1], $arr[0]];
    }
}
