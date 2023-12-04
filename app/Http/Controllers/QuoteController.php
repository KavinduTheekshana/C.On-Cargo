<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function handleFormSubmission(Request $request)
    {
        $settings = Settings::first();
        $destination = $request->input('destination');
        $deliveryType = $request->input('delivery_type'); // Corrected typo in the variable name
        $itemType = $request->input('item_type');
        $kg = $request->input('kg');
        $height = $request->input('height');
        $width = $request->input('width');
        $length = $request->input('length');

        // Constants for charges and fees
        $sl2uk_charges = [1 => $settings->sltouk1kg, 2 => $settings->sltouk2kg, 3 => $settings->sltouk3kg, 4 => $settings->sltouk4kg, 5 => $settings->sltouk5kg];
        $uk2sl_charges = [1 => $settings->uktosl1kg, 2 => $settings->uktosl2kg, 3 => $settings->uktosl3kg, 4 => $settings->uktosl4kg, 5 => $settings->uktosl5kg];
        $sl2uk_delivery_and_collection_fee_less_than_12kg = $settings->sltoukdeandcolless12;
        $sl2uk_delivery_and_collection_fee_more_than_12kg = $settings->sltoukdeandcolmore12;
        $uk2sl_delivery_and_collection_fee_less_than_20kg_wp = $settings->uktosldeandcolless20wp;
        $uk2sl_delivery_and_collection_fee_more_than_20kg_wp = $settings->uktosldeandcolmore20wp;
        $uk2sl_delivery_and_collection_fee_less_than_20kg_owp = $settings->uktosldeandcolless20owp;
        $uk2sl_delivery_and_collection_fee_more_than_20kg_owp = $settings->uktosldeandcolmore20owp;
        $per_kg_price_sl2uk = $settings->sltoukpkg;
        $per_kg_price_uk2sl_personal = $settings->uktoslpkgpersonal;
        $per_kg_price_uk2sl_commercial = $settings->uktoslpkgcommercial;

        // Initialize result and total
        $result = "";
        $total = 0;

        if ($destination == "sl2uk") {
            if ($deliveryType == "sl2uk_d2d") {
                if ($kg >= 1 && $kg <= 5) {
                    // Use array key to get charges for 1-5 kg
                    $result = "Your Estimate Charge is: £" . $sl2uk_charges[$kg];
                } elseif ($kg < 13) {
                    $chargeableWeight = $kg * $per_kg_price_sl2uk;
                    $chargeableDimension = (($height * $width * $length) / 5000) * $per_kg_price_sl2uk;

                    // Choose the greater of chargeable weight and chargeable dimension
                    $total = max($chargeableWeight, $chargeableDimension) + $sl2uk_delivery_and_collection_fee_less_than_12kg;
                    $result = "Your Estimate Charge is: £" . number_format($total, 2);
                } elseif ($kg < 31) {
                    $chargeableWeight = $kg * $per_kg_price_sl2uk;
                    $chargeableDimension = (($height * $width * $length) / 5000) * $per_kg_price_sl2uk;

                    // Choose the greater of chargeable weight and chargeable dimension
                    $total = max($chargeableWeight, $chargeableDimension) + $sl2uk_delivery_and_collection_fee_more_than_12kg;
                    $result = "Your Estimate Charge is: £" . number_format($total, 2);
                } else {
                    $result = "error_weight";
                }
            } else {
                $result = "error_method";
            }
        } elseif ($destination == "uk2sl") {

            if ($deliveryType == "uk2sl_wh2wh") {
                if ($itemType == "personal") {
                    if ($kg >= 1 && $kg <= 5) {
                        // Use array key to get charges for 1-5 kg
                        $result = "Your Estimate Charge is: £" . $uk2sl_charges[$kg];
                    } else if ($kg < 31) {
                        $chargeableWeight = $kg * $per_kg_price_uk2sl_personal;
                        $chargeableDimension = (($height * $width * $length) / 5000) * $per_kg_price_uk2sl_personal;

                        // Choose the greater of chargeable weight and chargeable dimension
                        $total = max($chargeableWeight, $chargeableDimension);
                        $result = "Your Estimate Charge is: £" . number_format($total, 2);
                    } else {
                        $result = "error_weight";
                    }
                } else if ($itemType == "commercial") {
                    if ($kg >= 1 && $kg <= 5) {
                        // Use array key to get charges for 1-5 kg
                        $result = "Your Estimate Charge is: £" . $per_kg_price_uk2sl_commercial[$kg];
                    } else if ($kg < 31) {
                        $chargeableWeight = $kg * $per_kg_price_uk2sl_commercial;
                        $chargeableDimension = (($height * $width * $length) / 5000) * $per_kg_price_uk2sl_commercial;

                        // Choose the greater of chargeable weight and chargeable dimension
                        $total = max($chargeableWeight, $chargeableDimension);
                        $result = "Your Estimate Charge is: £" . number_format($total, 2);
                    } else {
                        $result = "error_weight";
                    }
                } else {
                    $result = "error_item";
                }
            } else if ($deliveryType == "uk2sl_d2d_wp") {
                if ($itemType == "personal") {
                    if ($kg >= 1 && $kg <= 5) {
                        // Use array key to get charges for 1-5 kg
                        $result = "Your Estimate Charge is: £" . ($uk2sl_charges[$kg] + $uk2sl_delivery_and_collection_fee_less_than_20kg_wp);
                    } else if ($kg < 20) {
                        $chargeableWeight = $kg * $per_kg_price_uk2sl_personal;
                        $chargeableDimension = (($height * $width * $length) / 5000) * $per_kg_price_uk2sl_personal;

                        // Choose the greater of chargeable weight and chargeable dimension
                        $total = max($chargeableWeight, $chargeableDimension) + $uk2sl_delivery_and_collection_fee_less_than_20kg_wp;
                        $result = "Your Estimate Charge is: £" . number_format($total, 2);
                    } else if ($kg < 31) {
                        $chargeableWeight = $kg * $per_kg_price_uk2sl_personal;
                        $chargeableDimension = (($height * $width * $length) / 5000) * 4;

                        // Choose the greater of chargeable weight and chargeable dimension
                        $total = max($chargeableWeight, $chargeableDimension) + $uk2sl_delivery_and_collection_fee_more_than_20kg_wp;
                        $result = "Your Estimate Charge is: £" . number_format($total, 2);
                    } else {
                        $result = "error_weight";
                    }
                } else if ($itemType == "commercial") {
                    if ($kg >= 1 && $kg <= 5) {
                        // Use array key to get charges for 1-5 kg
                        $result = "Your Estimate Charge is: £" . ($per_kg_price_uk2sl_commercial[$kg] + $uk2sl_delivery_and_collection_fee_less_than_20kg_wp);
                    } else if ($kg < 20) {
                        $chargeableWeight = $kg * $per_kg_price_uk2sl_commercial;
                        $chargeableDimension = (($height * $width * $length) / 5000) * $per_kg_price_uk2sl_commercial;

                        // Choose the greater of chargeable weight and chargeable dimension
                        $total = max($chargeableWeight, $chargeableDimension) + $uk2sl_delivery_and_collection_fee_less_than_20kg_wp;
                        $result = "Your Estimate Charge is: £" . number_format($total, 2);
                    } else if ($kg < 31) {
                        $chargeableWeight = $kg * $per_kg_price_uk2sl_commercial + $uk2sl_delivery_and_collection_fee_more_than_20kg_wp;
                        $chargeableDimension = (($height * $width * $length) / 5000) * 4;

                        // Choose the greater of chargeable weight and chargeable dimension
                        $total = max($chargeableWeight, $chargeableDimension);
                        $result = "Your Estimate Charge is: £" . number_format($total, 2);
                    } else {
                        $result = "error_weight";
                    }
                } else {
                    $result = "error_item";
                }
            } else if ($deliveryType == "uk2sl_d2d_owp") {
                if ($itemType == "personal") {
                    if ($kg >= 1 && $kg <= 5) {
                        // Use array key to get charges for 1-5 kg
                        $result = "Your Estimate Charge is: £" . ($uk2sl_charges[$kg] + $uk2sl_delivery_and_collection_fee_less_than_20kg_owp);
                    } else if ($kg < 20) {
                        $chargeableWeight = $kg * $per_kg_price_uk2sl_personal;
                        $chargeableDimension = (($height * $width * $length) / 5000) * $per_kg_price_uk2sl_personal;

                        // Choose the greater of chargeable weight and chargeable dimension
                        $total = max($chargeableWeight, $chargeableDimension) + $uk2sl_delivery_and_collection_fee_less_than_20kg_owp;
                        $result = "Your Estimate Charge is: £" . number_format($total, 2);
                    } else if ($kg < 31) {
                        $chargeableWeight = $kg * $per_kg_price_uk2sl_personal;
                        $chargeableDimension = (($height * $width * $length) / 5000) * 4;

                        // Choose the greater of chargeable weight and chargeable dimension
                        $total = max($chargeableWeight, $chargeableDimension) + $uk2sl_delivery_and_collection_fee_more_than_20kg_owp;
                        $result = "Your Estimate Charge is: £" . number_format($total, 2);
                    } else {
                        $result = "error_weight";
                    }
                } else if ($itemType == "commercial") {
                    if ($kg >= 1 && $kg <= 5) {
                        // Use array key to get charges for 1-5 kg
                        $result = "Your Estimate Charge is: £" . ($per_kg_price_uk2sl_commercial[$kg] + $uk2sl_delivery_and_collection_fee_less_than_20kg_owp);
                    } else if ($kg < 13) {
                        $chargeableWeight = $kg * $per_kg_price_uk2sl_commercial;
                        $chargeableDimension = (($height * $width * $length) / 5000) * $per_kg_price_uk2sl_commercial;

                        // Choose the greater of chargeable weight and chargeable dimension
                        $total = max($chargeableWeight, $chargeableDimension) + $uk2sl_delivery_and_collection_fee_less_than_20kg_owp;
                        $result = "Your Estimate Charge is: £" . number_format($total, 2);
                    } else if ($kg < 31) {
                        $chargeableWeight = $kg * $per_kg_price_uk2sl_commercial + $uk2sl_delivery_and_collection_fee_more_than_20kg_owp;
                        $chargeableDimension = (($height * $width * $length) / 5000) * 4;

                        // Choose the greater of chargeable weight and chargeable dimension
                        $total = max($chargeableWeight, $chargeableDimension);
                        $result = "Your Estimate Charge is: £" . number_format($total, 2);
                    } else {
                        $result = "error_weight";
                    }
                } else {
                    $result = "error_item";
                }
            } else {
                $result = "error_method";
            }
        } else {
            // $result = "Your logic for other destinations goes here"; // Add your logic for other destinations
        }

        return response()->json($result);
    }
}
