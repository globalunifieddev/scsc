<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mda;

class MDASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mdasData = [
            ["mda_alias"=>"Govt", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Government House"],
            ["mda_alias"=>"DG", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Deputy Governor's Office"],
            ["mda_alias"=>"OSSG", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Office of the Secretary to the State Government"],
            ["mda_alias"=>"OHCS", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Office of Head of Civil Service"],
            ["mda_alias"=>"MWA", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Women Affairs"],
            ["mda_alias"=>"MoH", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Health"],
            ["mda_alias"=>"MoICT", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Information Culture and Tourism"],
            ["mda_alias"=>"MoA", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Agriculture"],
            ["mda_alias"=>"MOYSD", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Youth and Sports Development"],
            ["mda_alias"=>"MoSTI", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Science Technology & Innovation"],
            ["mda_alias"=>"MoTII", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Trade Industry and Investment"],
            ["mda_alias"=>"MoFBP", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Finance Budget and Planning"],
            ["mda_alias"=>"Ministry", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Special Duty, Humanitarian & NGOs"],
            ["mda_alias"=>"MLGCDCA", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry for Local Government, Community Development & Chieftaincy Affairs"],
            ["mda_alias"=>"MoENR", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Environment & Natural Resources"],
            ["mda_alias"=>"MoJ", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Justice"],
            ["mda_alias"=>"MLHUD", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"isa Mustapha Agwai Polytechnic"],
            ["mda_alias"=>"MWHT", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Works Housing & Transportation"],
            ["mda_alias"=>"Ministry", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Special Duty, Security and Sundry Matters"],
            ["mda_alias"=>"MoE", "mda_category"=>"Ministry", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Ministry of Education"],
            ["mda_alias"=>"NCPWB", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Christian Pilgrim Board"],
            ["mda_alias"=>"SA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"State Audit"],
            ["mda_alias"=>"NASITDEA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Information Technology & Digital Economy Agency"],
            ["mda_alias"=>"BPP", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Bureau of Public Procurement"],
            ["mda_alias"=>"NSSIA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Social Investment Agency"],
            ["mda_alias"=>"PHCDA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Primary Health Care Development Agency"],
            ["mda_alias"=>"NSADP", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa Agriculture Development Programme"],
            ["mda_alias"=>"NSUDB", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Urban Development Board"],
            ["mda_alias"=>"NSEMA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Emergency Management Agency"],
            ["mda_alias"=>"VRTB", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Vocational and Relevant Technology Board"],
            ["mda_alias"=>"NBS", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa Broadcasting Service"],
            ["mda_alias"=>"NSDSMA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Drugs and Supply Management Agency"],
            ["mda_alias"=>"NSRWSSA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Rural Water Supply & Sanitation Agency"],
            ["mda_alias"=>"NEPA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa Electricity Power Agency"],
            ["mda_alias"=>"NSBIR", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa Board of Internal Revenue Services"],
            ["mda_alias"=>"NSHIA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Health Insurance Agency"],
            ["mda_alias"=>"NSP", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Pension Board"],
            ["mda_alias"=>"NAGIS", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa Geographical Information Service"],
            ["mda_alias"=>"OAG", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Auditor General for Local Government Board"],
            ["mda_alias"=>"NSUBEB", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Universal Basic Education"],
            ["mda_alias"=>"SDGs", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Sustainable Development Goals"],
            ["mda_alias"=>"NASIDARC", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Infectious Diseases, Diagnosis and Research Centre"],
            ["mda_alias"=>"NASACA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State AIDs Control Agency"],
            ["mda_alias"=>"NASIDA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Investment & Development Agency"],
            ["mda_alias"=>"BoFED", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Bureau for Rural Development"],
            ["mda_alias"=>"SB", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Scholarship Board"],
            ["mda_alias"=>"NSWD", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Water Board"],
            ["mda_alias"=>"HCD", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Human Capital Development"],
            ["mda_alias"=>"HMB", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Hospitals Management Board"],
            ["mda_alias"=>"DASH​​", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Dalhatu Araf Specialist Hospital"],
            ["mda_alias"=>"NSMPWB", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Muslim Pilgrims Welfare Board"],
            ["mda_alias"=>"NSMVATMA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Motor Vehicle Administration and Traffic Management Agency"],
            ["mda_alias"=>"MA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Wing Commander Abdullahi Ibrahim"],
            ["mda_alias"=>"VTI", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Vocational and Technology Institute"],
            ["mda_alias"=>"NSEPA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Environmental Protection Agency"],
            ["mda_alias"=>"NASWAMSA", "mda_category"=>"Agency", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Waste Management and Sanitation Authority"],
            ["mda_alias"=>"NSMB", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Marketing Bureau"],
            ["mda_alias"=>"TSC", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Teachers Service Commission"],
            ["mda_alias"=>"NASIEC", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State Independent Electoral Commission"],
            ["mda_alias"=>"LGSC", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Local Government Service Commission"],
            ["mda_alias"=>"NSHASC", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State House of Assembly Service Commission"],
            ["mda_alias"=>"DRC", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Disability Rights Commission"],
            ["mda_alias"=>"BC", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Boundary Commission"],
            ["mda_alias"=>"CSC", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Civil Service Commission"],
            ["mda_alias"=>"JSC", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Judicial Service Commission"],
            ["mda_alias"=>"NSUK", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Nasarawa State University"],
            ["mda_alias"=>"ATCA", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"College of Education"],
            ["mda_alias"=>"AST", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"College of Agriculture Science and Technology"],
            ["mda_alias"=>"IMAP", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"Isa Mustapha Agwai Polytechnic"],
            ["mda_alias"=>"CON", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"College of Nursing Sciences"],
            ["mda_alias"=>"CHST", "mda_category"=>"Department", "address"=>"Lafia, Nasarawa State", "phone"=>"080000000", "email"=>"info@scsc.na.gov.ng", "added_by"=>"1", "mda_level"=>"SG", "name"=>"College of Health Science and Technology"]
        ];
        
        foreach ($mdasData as $mdaData) {
            MDA::create($mdaData);
        }
    }
}
