<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function handleFormSubmission(Request $request)
    {
        // Retrieve form data from the request
        $destination = $request->input('destination');
        $deliveryType = $request->input('delivery_type'); // Corrected typo in the variable name
        $itemType = $request->input('item_type');
        $kg = $request->input('kg');
        $height = $request->input('height');
        $width = $request->input('width');
        $length = $request->input('length');

        // Constants for charges and fees
        $sl2uk_charges = [1 => 22.00, 2 => 30.00, 3 => 34.00, 4 => 36.00, 5 => 38.00];
        $uk2sl_charges = [1 => 7.50, 2 => 15.00, 3 => 22.00, 4 => 30.00, 5 => 37.50];
        $sl2uk_delivery_and_collection_fee_less_than_12kg = 15;
        $sl2uk_delivery_and_collection_fee_more_than_12kg = 20;
        $uk2sl_delivery_and_collection_fee_less_than_20kg_wp = 15;
        $uk2sl_delivery_and_collection_fee_more_than_20kg_wp = 20;
        $uk2sl_delivery_and_collection_fee_less_than_20kg_owp = 20;
        $uk2sl_delivery_and_collection_fee_more_than_20kg_owp = 25;
        $per_kg_price_sl2uk = 4;
        $per_kg_price_uk2sl_personal = 5;
        $per_kg_price_uk2sl_commercial = 7.5;

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
                $result = "erroe_method";
            }
        } else {
            // $result = "Your logic for other destinations goes here"; // Add your logic for other destinations
        }

        return response()->json($result);
    }
}
