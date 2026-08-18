<?php
$videoUrls = [
    "https://rkdf.ac.in/naac/criteria3/3.4.7/beee_average_value.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/beee_faradays_law.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/bernaullis_equation.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/boundry_layer_flow.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/convulation_theorem.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/cpm_power_shovel.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/DHS_1.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/DHS_2.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/DHS_3.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/econimic_operation.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/em_1.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/em_2.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/emt_faradays.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/induction_type_energy_meter.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/Linear_Particle_Acclerator.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/load_commutation.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/locomotive.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/losses_in_%20pipe_2.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/losses_in_pipe_2.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/mechanism_of_Train_Movement.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/number_system.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/number_system_2.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/1_phase_full_converter_drive.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/scaler_magnetic_potential.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/Tariff.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/Thermal_hydro_%20power_plant.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/Carrier%20Phase%20NPTEL.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/Channel%20Capacity%20SWAYAM.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/Optimal%20Decision%20E-PGPATHSHALA.mp4",
    "https://rkdf.ac.in/images/gallery/video/sickle_cell.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/bioinformatics.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/BIOTECH_1.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/BIOTECH_2.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/blood_transfusion.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/bmm_1.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/diabetes.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/Ecology.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/operating_system.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/CASE_TAKING.mp4",
    "https://rkdf.ac.in/naac/criteria3/3.4.7/Indication_of_Nosodes.mp4"
];

foreach ($videoUrls as $url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo "{$code} => {$url}\n";
}
