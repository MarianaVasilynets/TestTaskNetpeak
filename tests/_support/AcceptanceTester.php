<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */

    public static function generateRandomString($length = 5)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public static function generateRandomIntNumber($length)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function strRgbToHex($color)
    {
        preg_match_all("/\((.+?)\)/", $color, $matches);
        if (!empty($matches[1][0])) {
            $rgb = explode(',', $matches[1][0]);
            $size = count($rgb);
            if ($size == 3 || $size == 4) {
                if ($size == 4) {
                    $alpha = array_pop($rgb);
                    $alpha = floatval(trim($alpha));
                    $alpha = ceil(($alpha * (255 * 100)) / 100);
                    array_push($rgb, $alpha);
                }

                $result = '#';
                foreach ($rgb as $row) {
                    $result .= str_pad(dechex(trim($row)), 2, '0', STR_PAD_LEFT);
                }

                return $result;
            }
        }

        return false;
    }

}
