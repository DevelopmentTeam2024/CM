<?php

namespace App\Enum;

enum ProductsEnum: string
{
    case AirOutlets = "Air Outlets";
    case DuctAccessories = "Duct Accessories";
    case Duct = "Duct";
    case LinearSlotDiffuser = "Linear Slot Diffuser";
    case LinearBarGrille = "Linear Bar Grille";
    case AirGrille = "Air Grille";
    case SquareCeilingDiffuser = "Square Ceiling Diffuser";
    case RoundCeilingDiffuser = "Round Ceiling Diffuser";
    case JetDiffuser = "Jet Diffuser";
    case SwirlDiffuser = "Swirl Diffuser";
    case DrumDiffuser = "Drum Diffuser";
    case ExhaustValve = "Exhaust Valve";
    case StationaryLouver = "Stationary Louver";
    case SandTrapLouver = "Sand Trap Louver";
    case FreshAirUnit = "Fresh Air Unit";
    case PentHouse = "Pent House";
    case HEPAFilterUnit = "HEPA Filter Unit";
    case PlenumBox = "Plenum Box";
    case BackDraftDamper = "Back Draft Damper";
    case VolumeControlDamper = "Volume Control Damper";
    case CurtainFireDamper = "Curtain Fire Damper";
    case RotatingBladeFireDamper = "Rotating-Blade Fire Damper";
    case CombinedFireSmokeDamper = "Combined Fire-Smoke Damper";
    case SoundAttenuator = "Sound Attenuator";
    case DuctAccessDoor = "Duct Access Door";

    public function code()
    {
        return match ($this) {
            self::AirOutlets => "AirOutlets",
            self::DuctAccessories => "DuctAccessories",
            self::Duct => "Duct",
            self::LinearSlotDiffuser => "LinearSlotDiffuser",
            self::LinearBarGrille => "LinearBarGrille",
            self::AirGrille => "AirGrille",
            self::SquareCeilingDiffuser => "SquareCeilingDiffuser",
            self::RoundCeilingDiffuser => "RoundCeilingDiffuser",
            self::JetDiffuser => "JetDiffuser",
            self::SwirlDiffuser => "SwirlDiffuser",
            self::DrumDiffuser => "DrumDiffuser",
            self::ExhaustValve => "ExhaustValve",
            self::StationaryLouver => "StationaryLouver",
            self::SandTrapLouver => "SandTrapLouver",
            self::FreshAirUnit => "FreshAirUnit",
            self::PentHouse => "PentHouse",
            self::HEPAFilterUnit => "HEPAFilterUnit",
            self::PlenumBox => "PlenumBox",
            self::BackDraftDamper => "BackDraftDamper",
            self::VolumeControlDamper => "VolumeControlDamper",
            self::CurtainFireDamper => "CurtainFireDamper",
            self::RotatingBladeFireDamper => "Rotating-BladeFireDamper",
            self::CombinedFireSmokeDamper => "CombinedFire-SmokeDamper",
            self::SoundAttenuator => "SoundAttenuator",
            self::DuctAccessDoor => "DuctAccessDoor"
        };
    }

    public function name()
    {
        return match ($this) {
            self::AirOutlets => "Air Outlets",
            self::DuctAccessories => "Duct Accessories",
            self::Duct => "Duct",
            self::LinearSlotDiffuser => "Linear Slot Diffuser",
            self::LinearBarGrille => "Linear Bar Grille",
            self::AirGrille => "Air Grille",
            self::SquareCeilingDiffuser => "Square Ceiling Diffuser",
            self::RoundCeilingDiffuser => "Round Ceiling Diffuser",
            self::JetDiffuser => "Jet Diffuser",
            self::SwirlDiffuser => "Swirl Diffuser",
            self::DrumDiffuser => "Drum Diffuser",
            self::ExhaustValve => "Exhaust Valve",
            self::StationaryLouver => "Stationary Louver",
            self::SandTrapLouver => "Sand Trap Louver",
            self::FreshAirUnit => "Fresh Air Unit",
            self::PentHouse => "Pent House",
            self::HEPAFilterUnit => "HEPA Filter Unit",
            self::PlenumBox => "Plenum Box",
            self::BackDraftDamper => "Back Draft Damper",
            self::VolumeControlDamper => "Volume Control Damper",
            self::CurtainFireDamper => "Curtain Fire Damper",
            self::RotatingBladeFireDamper => "Rotating-Blade Fire Damper",
            self::CombinedFireSmokeDamper => "Combined Fire-Smoke Damper",
            self::SoundAttenuator => "Sound Attenuator",
            self::DuctAccessDoor => "Duct Access Door"
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

    public static function getItemFromCode(string $item): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->code() === $item) {
                return $case;
            }
        }
        return null; // Return null if item not found
    }

    public static function getDetails(string $string, string $separator = ", ")
    {
        $products = json_decode($string);
        if (is_array($products)) {
            $output = [];
            foreach ($products as $code) {
                $product = self::getItemFromCode($code);
                $output[] = $product->name();
            }
            return implode($separator, $output);
        }
        return $string;
    }

    public static function getItemFromDescription(string $description)
    {
        $products = self::list();
        foreach ($products as $product) {
            // Check if the product name exists in the description
            if (stripos($description, $product) !== false) {
                return $product;
            }
        }
        return null;
    }
}
