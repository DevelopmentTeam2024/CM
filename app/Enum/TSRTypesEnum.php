<?php

namespace App\Enum;

enum TSRTypesEnum: string
{
    case Calculations = "Calculations";
    case POQ = "Bill of Quantity";
    case Quotation = "Quotation";
    case Sample = "Sample";
    case DuctTakeOff = "Duct Take-off";
    case TechnicalSubmital = "Technical Submittal";
    case Prequalification = "Prequalification";
    case ComplianceStatement = "Compliance Statement";
    case NoiseStudy = "Noise Study";
    case ConsaltanceComments = "Consaltance Comments";
    case Letters = "Letters";
    case SpecsAnalysis = "Specs Analysis";
    case Other = "Other";

    public function code(): string
    {
        return match ($this) {
            self::Calculations => "Calculations",
            self::POQ => "POQ",
            self::Quotation => "Quotation",
            self::Sample => "Sample",
            self::DuctTakeOff => "DuctTakeOff",
            self::TechnicalSubmital => "TechnicalSubmittal",
            self::Prequalification => "Prequalification",
            self::ComplianceStatement => "ComplianceStatement",
            self::NoiseStudy => "NoiseStudy",
            self::ConsaltanceComments => "ConsaltanceComments",
            self::Letters => "Letters",
            self::SpecsAnalysis => "SpecsAnalysis",
            self::Other => "Other"
        };
    }
    public function title(): string
    {
        return match ($this) {
            self::Calculations => "Calculations",
            self::POQ => "Bill of Quantity",
            self::Quotation => "Quotation",
            self::Sample => "Sample",
            self::DuctTakeOff => "Duct Take-off",
            self::TechnicalSubmital => "Technical Submittal",
            self::Prequalification => "Prequalification",
            self::ComplianceStatement => "Compliance Statement",
            self::NoiseStudy => "Noise Study",
            self::ConsaltanceComments => "Consaltance Comments",
            self::Letters => "Letters",
            self::SpecsAnalysis => "Specs Analysis",
            self::Other => "Other"
        };
    }
    public static function list(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    public static function getItem(string $item): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->value === $item) {
                return $case;
            }
        }
        return null; // Return null if item not found
    }
}
