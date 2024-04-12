<?php
declare(strict_types=1);

class ProcessForm
{
    /**
     * Обработка формы и получение корней квадратного уравнения
     *
     * @param object $data
     * @return array
     * @throws dml_exception
     */
    public static function execute(object $data): array
    {
        global $DB;

        $a = (float)$data->a;
        $b = (float)$data->b;
        $c = (float)$data->c;

        $discriminant = $b ** 2 - 4 * $a * $c;
        $roots = self::calculateRoots($a, $b, $discriminant);

        $record = new stdClass;
        $record->a = $a;
        $record->b = $b;
        $record->c = $c;
        $record->x1 = $roots[0] ?? null;
        $record->x2 = $roots[1] ?? null;

        $DB->insert_record('calculator', $record);

        return [$record->x1, $record->x2];
    }

    /**
     * Вычисление корней квадратного уравнения
     *
     * @param float $a
     * @param float $b
     * @param float $discriminant
     * @return array
     */
    private static function calculateRoots(float $a, float $b, float $discriminant): array
    {
        if ($discriminant > 0) {
            return [
                (-$b + sqrt($discriminant)) / (2 * $a),
                (-$b - sqrt($discriminant)) / (2 * $a)
            ];
        } elseif ($discriminant == 0) {
            return [-$b / (2 * $a)];
        }
        return [];
    }
}
