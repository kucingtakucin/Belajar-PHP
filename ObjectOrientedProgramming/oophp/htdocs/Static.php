<?php
class UjiStatic {
    /**
     * @var string
     */
    private string $nama = 'Adam Arthur Faizal';
    private static int $angka = 0;

    /**
     * @return int
     */
    public static function getAngka(): int {
        return self::$angka++;
    }

    /**
     * @return string
     */
    public function getNama(): string {
        return $this->nama;
    }

}

$objek1 = new UjiStatic();
echo $objek1->getNama() . '<br>';
echo UjiStatic::getAngka() . '<br>';
echo UjiStatic::getAngka() . '<br>';
echo UjiStatic::getAngka() . '<br>';
$objek2 = new UjiStatic();
echo $objek2->getNama() . '<br>';
echo UjiStatic::getAngka() . '<br>';
echo UjiStatic::getAngka() . '<br>';
echo UjiStatic::getAngka() . '<br>';
echo UjiStatic::getAngka() . '<br>';
