<?php
/**
 * Plugin Name: Erica Yang Realtor – Neighborhood Page Schema
 * Description: Injects JSON-LD schema markup for Cambridge and Lexington neighborhood pages directly in <head>.
 *              This bypasses Rank Math's internal schema format requirements.
 * Version: 1.0
 */

add_action( 'wp_head', 'eryr_neighborhood_schema', 1 );

function eryr_neighborhood_schema(): void {
	if ( is_page( 'cambridge-ma' ) ) {
		eryr_output_schema( eryr_cambridge_schema() );
	} elseif ( is_page( 'lexington-ma' ) ) {
		eryr_output_schema( eryr_lexington_schema() );
	}
}

function eryr_output_schema( array $schema ): void {
	echo '<script type="application/ld+json">' . "\n";
	echo wp_json_encode( $schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
	echo "\n" . '</script>' . "\n";
}

function eryr_cambridge_schema(): array {
	return [
		'@context' => 'https://schema.org',
		'@graph'   => [
			[
				'@type'            => 'Place',
				'@id'              => 'https://ericayangrealtor.com/neighborhoods/cambridge-ma/#place',
				'name'             => 'Cambridge, Massachusetts',
				'description'      => 'Cambridge is one of Greater Boston\'s most vibrant communities, home to Harvard University and MIT, blending historic architecture with cutting-edge innovation.',
				'geo'              => [ '@type' => 'GeoCoordinates', 'latitude' => '42.3736', 'longitude' => '-71.1097' ],
				'address'          => [ '@type' => 'PostalAddress', 'addressLocality' => 'Cambridge', 'addressRegion' => 'MA', 'addressCountry' => 'US' ],
				'containedInPlace' => [ '@type' => 'State', 'name' => 'Massachusetts' ],
			],
			[
				'@type'       => 'RealEstateAgent',
				'@id'         => 'https://ericayangrealtor.com/#agent',
				'name'        => 'Erica Yang',
				'email'       => 'erica.yang@cbrealty.com',
				'telephone'   => '617-401-7398',
				'url'         => 'https://ericayangrealtor.com',
				'areaServed'  => [
					[ '@type' => 'City', 'name' => 'Cambridge' ],
					[ '@type' => 'City', 'name' => 'Somerville' ],
					[ '@type' => 'City', 'name' => 'Brookline' ],
					[ '@type' => 'City', 'name' => 'Lexington' ],
					[ '@type' => 'City', 'name' => 'Belmont' ],
				],
			],
			[
				'@type'           => 'BreadcrumbList',
				'@id'             => 'https://ericayangrealtor.com/neighborhoods/cambridge-ma/#breadcrumb',
				'itemListElement' => [
					[ '@type' => 'ListItem', 'position' => 1, 'name' => 'Home',          'item' => 'https://ericayangrealtor.com/' ],
					[ '@type' => 'ListItem', 'position' => 2, 'name' => 'Neighborhoods', 'item' => 'https://ericayangrealtor.com/neighborhoods/' ],
					[ '@type' => 'ListItem', 'position' => 3, 'name' => 'Cambridge, MA', 'item' => 'https://ericayangrealtor.com/neighborhoods/cambridge-ma/' ],
				],
			],
			[
				'@type'      => 'FAQPage',
				'@id'        => 'https://ericayangrealtor.com/neighborhoods/cambridge-ma/#faq',
				'mainEntity' => [
					[ '@type' => 'Question', 'name' => 'What is the cost of living in Cambridge?', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'Cambridge has a higher cost of living compared to the national average, primarily driven by housing costs. The median home price is around $1.1M, though prices vary significantly by neighborhood and property type.' ] ],
					[ '@type' => 'Question', 'name' => 'Are Cambridge schools good?',              'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'Cambridge receives an A rating from Niche.com overall. The city is particularly renowned for exceptional private schools including Buckingham Browne & Nichols, Shady Hill School, and Cambridge Friends School.' ] ],
					[ '@type' => 'Question', 'name' => 'Is Cambridge a good place for families?', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'Yes! Cambridge offers an excellent quality of life for families with diverse educational options, numerous parks, family-friendly restaurants, and safe walkable neighborhoods near the Charles River.' ] ],
					[ '@type' => 'Question', 'name' => 'Do I need a car in Cambridge?',           'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'No — many Cambridge residents live car-free thanks to 7 Red Line stations, extensive bus network, and bike infrastructure with a Walk Score of 90+.' ] ],
				],
			],
			[
				'@type'       => 'WebPage',
				'@id'         => 'https://ericayangrealtor.com/neighborhoods/cambridge-ma/#webpage',
				'url'         => 'https://ericayangrealtor.com/neighborhoods/cambridge-ma/',
				'name'        => 'Cambridge MA Homes for Sale | Erica Yang Realtor',
				'description' => 'Explore homes for sale in Cambridge, MA. Local expert Erica Yang provides market insights, school info, and personalized home searches.',
				'inLanguage'  => 'en-US',
			],
		],
	];
}

function eryr_lexington_schema(): array {
	return [
		'@context' => 'https://schema.org',
		'@graph'   => [
			[
				'@type'            => 'Place',
				'@id'              => 'https://ericayangrealtor.com/neighborhoods/lexington-ma/#place',
				'name'             => 'Lexington, Massachusetts',
				'description'      => 'Lexington is a historic and prestigious town northwest of Boston, renowned for its role in the American Revolution and consistently top-ranked public school system.',
				'geo'              => [ '@type' => 'GeoCoordinates', 'latitude' => '42.4473', 'longitude' => '-71.2322' ],
				'address'          => [ '@type' => 'PostalAddress', 'addressLocality' => 'Lexington', 'addressRegion' => 'MA', 'addressCountry' => 'US' ],
				'containedInPlace' => [ '@type' => 'State', 'name' => 'Massachusetts' ],
			],
			[
				'@type'       => 'RealEstateAgent',
				'@id'         => 'https://ericayangrealtor.com/#agent',
				'name'        => 'Erica Yang',
				'email'       => 'erica.yang@cbrealty.com',
				'telephone'   => '617-401-7398',
				'url'         => 'https://ericayangrealtor.com',
				'areaServed'  => [
					[ '@type' => 'City', 'name' => 'Lexington' ],
					[ '@type' => 'City', 'name' => 'Cambridge' ],
					[ '@type' => 'City', 'name' => 'Arlington' ],
					[ '@type' => 'City', 'name' => 'Belmont' ],
					[ '@type' => 'City', 'name' => 'Bedford' ],
					[ '@type' => 'City', 'name' => 'Waltham' ],
				],
			],
			[
				'@type'           => 'BreadcrumbList',
				'@id'             => 'https://ericayangrealtor.com/neighborhoods/lexington-ma/#breadcrumb',
				'itemListElement' => [
					[ '@type' => 'ListItem', 'position' => 1, 'name' => 'Home',          'item' => 'https://ericayangrealtor.com/' ],
					[ '@type' => 'ListItem', 'position' => 2, 'name' => 'Neighborhoods', 'item' => 'https://ericayangrealtor.com/neighborhoods/' ],
					[ '@type' => 'ListItem', 'position' => 3, 'name' => 'Lexington, MA', 'item' => 'https://ericayangrealtor.com/neighborhoods/lexington-ma/' ],
				],
			],
			[
				'@type'      => 'FAQPage',
				'@id'        => 'https://ericayangrealtor.com/neighborhoods/lexington-ma/#faq',
				'mainEntity' => [
					[ '@type' => 'Question', 'name' => 'How are Lexington\'s public schools ranked?', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'Lexington Public Schools are consistently ranked among the top school districts in Massachusetts and the nation. Lexington High School ranks in the top 5% of high schools nationally with an A+ rating from Niche.com.' ] ],
					[ '@type' => 'Question', 'name' => 'How long is the commute from Lexington to Boston?', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'By car via Route 2, the commute takes 25-40 minutes depending on traffic. By MBTA Bus 62/76 to Alewife then Red Line, total door-to-door time is typically 45-60 minutes.' ] ],
					[ '@type' => 'Question', 'name' => 'What types of homes are available in Lexington?', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'Lexington is predominantly single-family homes — colonials, capes, split-levels, and contemporaries — with prices generally ranging from $900K to $3M+, median around $1.5M.' ] ],
					[ '@type' => 'Question', 'name' => 'Is Lexington a good investment for real estate?', 'acceptedAnswer' => [ '@type' => 'Answer', 'text' => 'Yes. Lexington real estate has historically been an excellent long-term investment. Homes frequently sell above asking with list-to-sale ratios around 104%, and top-ranked schools act as a natural floor for property values.' ] ],
				],
			],
			[
				'@type'       => 'WebPage',
				'@id'         => 'https://ericayangrealtor.com/neighborhoods/lexington-ma/#webpage',
				'url'         => 'https://ericayangrealtor.com/neighborhoods/lexington-ma/',
				'name'        => 'Lexington MA Homes for Sale | Erica Yang Realtor',
				'description' => 'Explore homes for sale in Lexington, MA. Local expert Erica Yang provides market insights, top-ranked school info, and personalized home searches for this historic, excellent-schools community.',
				'inLanguage'  => 'en-US',
			],
		],
	];
}
