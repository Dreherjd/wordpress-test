( function( api ) {

	// Extends our custom "cleanews" section.
	api.sectionConstructor['cleanews'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
