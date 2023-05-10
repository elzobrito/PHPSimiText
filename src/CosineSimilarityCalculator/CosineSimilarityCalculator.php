<?php

namespace PHPSimiTextApp\CosineSimilarityCalculator;

class CosineSimilarityCalculator
{
    public function calculateSimilarities($vectors, $main_vector)
    {
        try {
            $similarities = [];
            for ($i = 0; $i < count($vectors); $i++) {
                $similarities[$i] = 0;
                $vector1 = $vectors[$i];
                $vector2 = $main_vector;
                $dot_product = 0;
                $vector1_norm = 0;
                $vector2_norm = 0;
                foreach ($vector1 as $word => $weight) {
                    $dot_product += $weight * (isset($vector2[$word]) ? $vector2[$word] : 0);
                    $vector1_norm += pow($weight, 2);
                    $vector2_norm += pow((isset($vector2[$word]) ? $vector2[$word] : 0), 2);
                }
                if ($vector1_norm * $vector2_norm != 0) {
                    $similarities[$i] = $dot_product / sqrt($vector1_norm * $vector2_norm);
                } else {
                    $similarities[$i] = 0;
                }
            }
            return json_encode($similarities);
        } catch (\Exception $e) {
            throw new \Exception('Ocorreu um erro ao calcular a similaridade dos textos: ' . $e->getMessage());
        }
    }
}
