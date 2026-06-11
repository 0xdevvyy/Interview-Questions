<?php

enum DiscountType
{
    case Standard;
    case Seasonal;
    case Weight;

    public function discount(float $cartWeight): float
    {
        return match ($this) {
            self::Standard => 6.0,
            self::Seasonal => 12.0,
            self::Weight => $cartWeight <= 10 ? 6.0 : 18.0,
        };
    }
}

function getDiscountedPrice(
    float $cartWeight,
    float $totalPrice,
    DiscountType $discountType
): float {

    return $totalPrice - ($totalPrice * ( $discountType->discount($cartWeight) / 100));
}

echo getDiscountedPrice(12, 100, DiscountType::Weight);