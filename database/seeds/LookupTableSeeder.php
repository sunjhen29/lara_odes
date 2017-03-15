<?php

use Illuminate\Database\Seeder;

use App\Lookup;

class LookupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Street Extenstions
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = '';
        $lookup->code = '';
        $lookup->save(); 
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Street';
        $lookup->code = 'St';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Road';
        $lookup->code = 'Rd';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Avenue';
        $lookup->code = 'Ave';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Chase';
        $lookup->code = 'Ch';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Circuit';
        $lookup->code = 'Cct';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Close';
        $lookup->code = 'Cl';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Court';
        $lookup->code = 'Crt';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Crescent';
        $lookup->code = 'Crs';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Drive';
        $lookup->code = 'Dr';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Esplanade';
        $lookup->code = 'Esp';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Grove';
        $lookup->code = 'Gr';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Lane';
        $lookup->code = 'La';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Place';
        $lookup->code = 'Pl';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Rise';
        $lookup->code = 'Rse';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Terrace';
        $lookup->code = 'Tce';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Vista';
        $lookup->code = 'Vis';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Way';
        $lookup->code = 'Way';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Alley';
        $lookup->code = 'Aly';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Approach';
        $lookup->code = 'App';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Arcade';
        $lookup->code = 'Arc';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Bend';
        $lookup->code = 'Bnd';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Boulevard';
        $lookup->code = 'Bvd';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Boulevarde';
        $lookup->code = 'Blvd';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Bowl';
        $lookup->code = 'Bowl';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Brace';
        $lookup->code = 'Brc';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Brae';
        $lookup->code = 'Brae';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Break';
        $lookup->code = 'Brk';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Broadway';
        $lookup->code = 'Bdwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Brook';
        $lookup->code = 'Brook';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Brow';
        $lookup->code = 'Brow';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Bypass';
        $lookup->code = 'Byp';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Circle';
        $lookup->code = 'Cir';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Circus';
        $lookup->code = 'Ccs';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Common';
        $lookup->code = 'Cmmn';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Concourse';
        $lookup->code = 'Con';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Copse';
        $lookup->code = 'Cps';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Corner';
        $lookup->code = 'Cnr';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Corso';
        $lookup->code = 'Corso';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Course';
        $lookup->code = 'Course';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Courtyard';
        $lookup->code = 'Ctyd';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Cove';
        $lookup->code = 'Cove';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Crest';
        $lookup->code = 'Crst';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Cross';
        $lookup->code = 'Crss';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Crossing';
        $lookup->code = 'Crsg';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Curve';
        $lookup->code = 'Crv';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Dale';
        $lookup->code = 'Dale';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Dip';
        $lookup->code = 'Dip';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Down';
        $lookup->code = 'Down';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Downs';
        $lookup->code = 'Downs';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Driveway';
        $lookup->code = 'Drwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Edge';
        $lookup->code = 'Edge';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Elbow';
        $lookup->code = 'Elb';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'End';
        $lookup->code = 'End';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Entrance';
        $lookup->code = 'Ent';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Express';
        $lookup->code = 'Express';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Expressway';
        $lookup->code = 'Ewy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Extension';
        $lookup->code = 'Ext';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Fairway';
        $lookup->code = 'Frwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Follow';
        $lookup->code = 'Folw';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Formation';
        $lookup->code = 'Form';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Freeway';
        $lookup->code = 'Fwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Frontage';
        $lookup->code = 'Frntge';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Gap';
        $lookup->code = 'Gap';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Garden';
        $lookup->code = 'Gdn';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Gardens';
        $lookup->code = 'Gdns';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Gate';
        $lookup->code = 'Gte';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Gates';
        $lookup->code = 'Gtes';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Gateway';
        $lookup->code = 'Gateway';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Glade';
        $lookup->code = 'Gld';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Glen';
        $lookup->code = 'Gln';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Grange';
        $lookup->code = 'Gra';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Green';
        $lookup->code = 'Grn';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Grove';
        $lookup->code = 'Grv';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Grovet';
        $lookup->code = 'Grovet';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Haven';
        $lookup->code = 'Haven';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Heath';
        $lookup->code = 'Heath';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Heights';
        $lookup->code = 'Hts';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Highway';
        $lookup->code = 'Hwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Hill';
        $lookup->code = 'Hill';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Interchange';
        $lookup->code = 'Intg';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Island';
        $lookup->code = 'Island';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Junction';
        $lookup->code = 'Jnct';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Key';
        $lookup->code = 'Key';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Link';
        $lookup->code = 'Link';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Lookout';
        $lookup->code = 'Lkt';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Loop';
        $lookup->code = 'Loop';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Lower';
        $lookup->code = 'Lower';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Mall';
        $lookup->code = 'Mall';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Mead';
        $lookup->code = 'Mead';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Meander';
        $lookup->code = 'Mndr';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Mews';
        $lookup->code = 'Mews';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Motorway';
        $lookup->code = 'Mwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Nook';
        $lookup->code = 'Nook';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Outlook';
        $lookup->code = 'Outlk';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Parade';
        $lookup->code = 'Pde';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Park';
        $lookup->code = 'Park';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Parkway';
        $lookup->code = 'Pkwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Pass';
        $lookup->code = 'Pass';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Path';
        $lookup->code = 'Pth';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Pathway';
        $lookup->code = 'Pwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Pier';
        $lookup->code = 'Pier';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Plaza';
        $lookup->code = 'Plz';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Pocket';
        $lookup->code = 'Pkt';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Point';
        $lookup->code = 'Pnt';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Port';
        $lookup->code = 'Port';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Promenade';
        $lookup->code = 'Prom';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Quadrant';
        $lookup->code = 'Qdrt';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Quay';
        $lookup->code = 'Quay';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Quays';
        $lookup->code = 'Qys';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Ramble';
        $lookup->code = 'Rmbl';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Reach';
        $lookup->code = 'Rch';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Reserve';
        $lookup->code = 'Res';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Rest';
        $lookup->code = 'Rest';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Retreat';
        $lookup->code = 'Ret';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Return';
        $lookup->code = 'Return';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Ridge';
        $lookup->code = 'Ridge';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Roadway';
        $lookup->code = 'Rdwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Rotary';
        $lookup->code = 'Rotary';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Round';
        $lookup->code = 'Rnd';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Route';
        $lookup->code = 'Rte';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Row';
        $lookup->code = 'Row';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Serviceway';
        $lookup->code = 'Serviceway';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Siding';
        $lookup->code = 'Siding';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Slope';
        $lookup->code = 'Slope';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Spur';
        $lookup->code = 'Spur';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Square';
        $lookup->code = 'Sq';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Steps';
        $lookup->code = 'Stps';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Strand';
        $lookup->code = 'Stra';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Subway';
        $lookup->code = 'Sbwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Tarn';
        $lookup->code = 'Tarn';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Throughway';
        $lookup->code = 'Throughway';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Tollway';
        $lookup->code = 'Twy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Top';
        $lookup->code = 'Top';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Tor';
        $lookup->code = 'Tor';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Track';
        $lookup->code = 'Trk';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Trail';
        $lookup->code = 'Trl';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Turn';
        $lookup->code = 'Turn';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Underpass';
        $lookup->code = 'Upas';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Vale';
        $lookup->code = 'Vle';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Valley';
        $lookup->code = 'Valley';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'View';
        $lookup->code = 'View';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Walk';
        $lookup->code = 'Wlk';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Walkway';
        $lookup->code = 'Wwy';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Wynd';
        $lookup->code = 'Wynd';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'street_extension';
        $lookup->name = 'Yard';
        $lookup->code = 'Yard';
        $lookup->save();
        
        //States
        
        $lookup = new Lookup();
        $lookup->filter = 'states';
        $lookup->name = 'NZ';
        $lookup->code = 'NZ';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'states';
        $lookup->name = 'ACT';
        $lookup->code = 'ACT';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'states';
        $lookup->name = 'NSW';
        $lookup->code = 'NSW';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'states';
        $lookup->name = 'QLD';
        $lookup->code = 'QLD';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'states';
        $lookup->name = 'SA';
        $lookup->code = 'SA';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'states';
        $lookup->name = 'TAS';
        $lookup->code = 'TAS';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'states';
        $lookup->name = 'VIC';
        $lookup->code = 'VIC';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'states';
        $lookup->name = 'NT';
        $lookup->code = 'NT';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'states';
        $lookup->name = 'WA';
        $lookup->code = 'WA';
        $lookup->save();
        
    //Property Type Interest
        
        $lookup = new Lookup();
        $lookup->filter = 'prop_type';
        $lookup->name = 'House';
        $lookup->code = 'HO';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'prop_type';
        $lookup->name = 'Unit / Townhouse / Flats';
        $lookup->code = 'UN';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'prop_type';
        $lookup->name = 'Studio';
        $lookup->code = 'UN,70';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'prop_type';
        $lookup->name = 'Flat';
        $lookup->code = 'FL';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'prop_type';
        $lookup->name = 'Commercial';
        $lookup->code = 'CO';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'prop_type';
        $lookup->name = 'Land';
        $lookup->code = 'LA';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'prop_type';
        $lookup->name = 'Farm / Rural';
        $lookup->code = 'FA';
        $lookup->save();

    //PROPERTY TYPE NEWS
    
        //HOUSE
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'HOUSE';
        $lookup->code = 'HO';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'HOUSE - ONE STOREY / LOWSET';
        $lookup->code = 'HO,10';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'HOUSE - TWO STOREY / HIGHSET';
        $lookup->code = 'HO,20';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'HOUSE - MULTI STOREY';
        $lookup->code = 'HO,50';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'HOUSE - ACREAGE';
        $lookup->code = 'HO,60';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'HOUSE - DUAL OCCUPANCY';
        $lookup->code = 'HO,70';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'HOUSE - SEMI DETACHED';
        $lookup->code = 'HO,80';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'HOUSE - DUPLEX';
        $lookup->code = 'HO,85';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'HOUSE - TERRACE';
        $lookup->code = 'HO,90';
        $lookup->save();
        
        //UNIT
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'UNIT';
        $lookup->code = 'UN';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'UNIT - TOWNHOUSE / VILLA';
        $lookup->code = 'UN,10';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'UNIT - LOWRISE';
        $lookup->code = 'UN,20';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'UNIT - HIGHRISE';
        $lookup->code = 'UN,30';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'UNIT - PENTHOUSE';
        $lookup->code = 'UN,40';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'UNIT - TRIPLEX';
        $lookup->code = 'UN,50';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'UNIT - QUADRUPLEX';
        $lookup->code = 'UN,60';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'UNIT - STUDIO';
        $lookup->code = 'UN,70';
        $lookup->save();
        
        //COMMERCIAL
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'COMMERCIAL';
        $lookup->code = 'CO';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'COMMERCIAL - RETAIL BUILDING';
        $lookup->code = 'CO,30';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'COMMERCIAL - OFFICE BUILDING';
        $lookup->code = 'CO,50';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'COMMERCIAL - INDUSTRIAL BUILDING';
        $lookup->code = 'CO,70';
        $lookup->save();
        
        //LAND
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'LAND';
        $lookup->code = 'LA';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'LAND - RESIDENTIAL HOUSE';
        $lookup->code = 'LA,10';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'LAND - RESIDENTIAL ACREAGE';
        $lookup->code = 'LA,20';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'LAND - RURAL ACREAGE';
        $lookup->code = 'LA,30';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'LAND - RESIDENTIAL DEVELOPMENT';
        $lookup->code = 'LA,50';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'LAND - OFFICE / RETAIL';
        $lookup->code = 'LA,60';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'LAND - INDUSTRIAL';
        $lookup->code = 'LA,65';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'LAND - PARKS / RESERVES';
        $lookup->code = 'LA,70';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'LAND - GOVERNMENT';
        $lookup->code = 'LA,85';
        $lookup->save();
        
        //FARM
        $lookup = new Lookup();
        $lookup->filter = 'property_type';
        $lookup->name = 'FARM / RURAL';
        $lookup->code = 'FA';
        $lookup->save();
        
    //SALE TYPE NEWS
    
        $lookup = new Lookup();
        $lookup->filter = 'listing_type';
        $lookup->name = 'AUCTION';
        $lookup->code = 'A';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'listing_type';
        $lookup->name = 'MORTGAGEE SALE';
        $lookup->code = 'M';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'listing_type';
        $lookup->name = 'MORTGAGEE AUCTION';
        $lookup->code = 'MA';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'listing_type';
        $lookup->name = 'NORMAL SALE';
        $lookup->code = 'S';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'listing_type';
        $lookup->name = 'TENDER';
        $lookup->code = 'T';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'listing_type';
        $lookup->name = 'OTHER';
        $lookup->code = 'O';
        $lookup->save();
        
    //SALE TYPE INTEREST
        
        $lookup = new Lookup();
        $lookup->filter = 'sale_type';
        $lookup->name = 'Sold at Auction';
        $lookup->code = 'Sold at Auction';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'sale_type';
        $lookup->name = 'Sold Prior to Auction';
        $lookup->code = 'Sold Prior to Auction';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'sale_type';
        $lookup->name = 'Normal Sale';
        $lookup->code = 'Normal Sale';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'sale_type';
        $lookup->name = 'No Bid';
        $lookup->code = 'No Bid';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'sale_type';
        $lookup->name = 'Passed In';
        $lookup->code = 'Passed In';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'sale_type';
        $lookup->name = 'Sold After Auction';
        $lookup->code = 'Sold After Auction';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'sale_type';
        $lookup->name = 'Vendor Bid';
        $lookup->code = 'Vendor Bid';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'sale_type';
        $lookup->name = 'Withdrawn';
        $lookup->code = 'Withdrawn';
        $lookup->save();
        
    //LEAVE TYPE
    
        $lookup = new Lookup();
        $lookup->filter = 'leave_type';
        $lookup->name = 'SICK LEAVE';
        $lookup->code = 'sick_leave';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'leave_type';
        $lookup->name = 'VACATION LEAVE';
        $lookup->code = 'vacation_leave';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'leave_type';
        $lookup->name = 'PATERNITY LEAVE';
        $lookup->code = 'paternity_leave';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'leave_type';
        $lookup->name = 'SINGLE-PARENT LEAVE';
        $lookup->code = 'singleparent_leave';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'leave_type';
        $lookup->name = 'EMERGENCY LEAVE';
        $lookup->code = 'emergency_leave';
        $lookup->save();
        
        $lookup = new Lookup();
        $lookup->filter = 'leave_type';
        $lookup->name = 'OTHERS (SPECIAL)';
        $lookup->code = 'other_leave';
        $lookup->save();
    }
}
