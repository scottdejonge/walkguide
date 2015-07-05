<?php

	// Page settings
	$this->set('title_for_layout', 'About Walk Guide');

?>

<section class="page-header">
	<div class="container">
		<div class="page-header-content">
			<h1 class="page-header-title">About</h1>
		</div>
	</div>
</section>

<main class="content">
	<div class="container">
	
		<section class="content-inner">
			<table class="table table-block table-responsive">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th width="18%">
							<svg class="page-header-icon" viewBox="0 0 44 44">
								<use xlink:href="/assets/icons/grades.svg#icon-grade-1"></use>
							</svg>
							<h3>Grade 1</h3>
						</th>
						<th width="18%">
							<svg class="page-header-icon" viewBox="0 0 44 44">
								<use xlink:href="/assets/icons/grades.svg#icon-grade-2"></use>
							</svg>
							<h3>Grade 2</h3>
						</th>
						<th width="18%">
							<svg class="page-header-icon" viewBox="0 0 44 44">
								<use xlink:href="/assets/icons/grades.svg#icon-grade-3"></use>
							</svg>
							<h3>Grade 3</h3>
						</th>
						<th width="18%">
							<svg class="page-header-icon" viewBox="0 0 44 44">
								<use xlink:href="/assets/icons/grades.svg#icon-grade-4"></use>
							</svg>
							<h3>Grade 4</h3>
						</th>
						<th width="18%">
							<svg class="page-header-icon" viewBox="0 0 44 44">
								<use xlink:href="/assets/icons/grades.svg#icon-grade-5"></use>
							</svg>
							<h3>Grade 5</h3>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Distance</th>
						<td>Less than 5km.</td>
						<td>Less than 10km.</td>
						<td>Less than 20km.</td>
						<td>May be greater than 20km. Distance does not influence grading.</td>
						<td>May be greater than 20km. Distance does not influence grading.</td>
					</tr>
					<tr>
						<th>Gradient</th>
						<td>Suitable for a person in a wheelchair.</td>
						<td>Generally no steeper than 1:10</td>
						<td>May exceed 1:10</td>
						<td>May have arduous climbs and steep sections. May include long steep sections exceeding 1:10.</td>
						<td>May have arduous climbs and steep sections. May include long steep sections exceeding 1:10.</td>
					</tr>
					<tr>
						<th>Quality of path</th>
						<td>Broad, hard surfaced track of path suitable for wheelchair use.</td>
						<td>Generally a modified or hardened surface.</td>
						<td>Formed earthen track, few obstacles. Generally a modified surface, sections may be hardened.</td>
						<td>Generally distinct without major modification to the ground. Encounters with fallen debris and other obstacles are likely. Walkers may encounter natural obstacles (e.g. tides).</td>
						<td>No modification of the natural environment</td>
					</tr>
					<tr>
						<th>Quality of markings</th>
						<td>Track head signage &amp; route markers at intersections.</td>
						<td>Track head signage &amp; route markers at intersections.</td>
						<td>Track head signage &amp; route markers at intersections and where track is indistinct.</td>
						<td>Track head signage and route markers.</td>
						<td>Signage is generally not provided</td>
					</tr>
					<tr>
						<th>Experience required</th>
						<td>Users need no pervious experience and are expected to exercise normal care regarding their personal safety.</td>
						<td>Users need no pervious experience and are expected to exercise normal care regarding their personal safety. Suitable for most ages and fitness levels.</td>
						<td>Users need no bushwalking experience and a minimum level of specialised skills. Users may encounter natural hazards such as steep slopes, unstable surfaces and minor water crossings. Responsible for their own safety.</td>
						<td>Users require a moderate level of specialised skills such as navigation skills. Users may require maps and navigation equipment to successfully complete the track. Users need to be self-reliant, particularly in regard to emergency first aid and possible weather hazards.</td>
						<td>Users require previous experience in the outdoors and a high level of specialised skills such as navigation skills. Users will generally require a map and navigation equipment to complete the track. Users need to be self-reliant, particularly in regard to emergency first aid and possible weather hazards.</td>
					</tr>
					<tr>
						<th>Steps</th>
						<td>Steps with ramp access.</td>
						<td>Minimal use of steps.</td>
						<td>Steps may be common.</td>
						<td>Steps do not influence grading.</td>
						<td>Steps do not influence grading.</td>
					</tr>
				</tbody>
			</table>
		</section>

		<section class="content-inner">
			<p class="lead">Walk Guide is a responsive web application for discovering walks throughout Queensland. Walk tracks and trails are mapped onto Google Maps with a polyline using KML data. Users can rate and comment on walks.</p>

			<h2>Features</h2>
			<ul>
				<li>User ratings</li>
				<li>Comment threads</li>
				<li>National 5 Grade Walk System</li>
			</ul>

			<h2>Datasets</h2>
			<p><a href="https://data.qld.gov.au/dataset/queensland-parks-and-wildlife-service-access">Queensland Parks and Wildlife Service access</a></p>

			<h2>Technology</h2>
			<ul>
				<li>CakePHP</li>
				<li>HTML5</li>
				<li>CSS3</li>
				<li><a href="http://bigfishtv.github.io/turret/">Turret</a></li>
				<li>Javascript/jQuery</li>
				<li>Google Maps</li>
				<li>KML</li>
			</ul>

			<h2>Roadmap</h2>

			<h3>General</h3>
			<ul>
				<li>
					Hazard Markers
					<ul>
						<li>Users mark hazards and flag to National Parks</li>
					</ul>
				</li>
				<li>Emergency Response</li>
			</ul>

			<h3>Walks</h3>
			<ul>
				<li>Distance</li>
				<li>Elevation</li>
				<li>Start/End Points</li>
				<li>Status (open/closed)</li>
				<li>Nearby Sites &amp; Landmarks</li>
			</ul>

			<h3>Social</h3>
			<ul>
				<li>User Profiles</li>
				<li>Recommended Walks</li>
				<li>OAuth Login</li>
				<li>Share Links</li>
				<li>Open Graph Meta Data</li>
			</ul>

			<h3>Search &amp; Filtering</h3>

			<ul>
				<li>
					Search
					<ul>
						<li>Location</li>
						<li>Nearest</li>
						<li>Within National Park</li>
						<li>Keyword Search</li>
					</ul>
				</li>
				<li>
					Filtering
					<ul>
						<li>Difficulty Grading</li>
						<li>Distance &amp; Time</li>
						<li>From Walk (km Radius of user)</li>
						<li>Walk Length</li>
						<li>Walk Time</li>
						<li>User Ratings</li>
					</ul>
				</li>
			</ul>

			<h3>Media</h3>

			<ul>
				<li>Image Uploads</li>
				<li>Video Uploads</li>
				<li>Geolocation of Uploads</li>
				<li>Pin Media along walk path</li>
				<li>“Walk Highlights”</li>
			</ul>

			<h2>Contributors</h2>
			<p><strong>Scott de Jonge</strong></p>
			<ul>
				<li>Twitter: <a href="https://twitter.com/scottdejonge">@scottdejonge</a></li>
				<li>Github: <a href="https://github.com/scottdejonge">@scottdejonge</a></li>
			</ul>
		</section>
	</div>
</section>