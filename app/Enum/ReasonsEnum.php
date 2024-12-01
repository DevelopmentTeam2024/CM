<?php
namespace App\Enum;

enum ReasonsEnum: string {
    case PRICE_IS_HIGH = 'Price is high';
    case ANOTHER_COMPETITOR = 'another competitor';
    case QUALITY_LOWRER_THAN_EXPECTED = 'Quality lower than expected';
    case DISAGREEMENT_ABOUT_DELIVERY_DATE = 'Disagreement about delivery date';
    case DELAY_IN_TSR = 'Delay in TSR';
    case NOT_IN_VENDOR_LIST = 'Not in vendor list';
    case REQUIRED_TEST_UNAVAILABLECASE = 'Required test unavailablecase';
    case NON_COMPLIANCE_TO_SPACS = 'Non-compliance to specs';
    case FREQUENT_ERRORS_IN_SUBMISSION = 'Frequent errors in submission';

    public static function values(): array
    {
        return array_map(fn($reason) => $reason->value, self::cases());
    }
}