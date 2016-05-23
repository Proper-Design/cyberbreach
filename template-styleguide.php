<?php
/**
 * Template Name: Styleguide
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */
 get_header();

 ?>

 <div class="site-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<main <?php post_class(); ?> id="page-<?php the_ID(); ?>">
			<?php the_title('<h1>', '</h1>'); ?>
      <?php the_content(); ?>
      

      <section class="sg-logo">
        <h2 class="sg-section-header">Logo</h2>
        <img class="sg-logo-image" src="<?=get_field('sg_logo')['url']; ?>" alt="">
      </section>
      
      <section class="sg-colors">
        <h2 class="sg-section-header">Brand colours</h2>
        <div class="sg-color-1"></div>
        <div class="sg-color-2"></div>
        <div class="sg-color-3"></div>
        <div class="sg-color-4"></div>
        <div class="sg-color-5"></div>
      </section>

      <?php if(have_rows('sg_accents')): ?>
        <section class="sg-accents">
          <h2 class="sg-section-header">Visual accents</h2>
          <?php while(have_rows('sg_accents')): the_row(); ?>
            <img class="sg-accent" src="<?=get_sub_field('sg_accent')['url']; ?>">
          <?php endwhile; ?>
        </section>
      <?php endif; ?>

      <section class="sg-words">
      <?php if(have_rows('sg_words')): while(have_rows('sg_words')): the_row(); ?>
        <span class="sg-word"><?=get_sub_field('sg_word'); ?></span>
      <?php endwhile; endif; ?>
      </section>

      <section class="sg-tags-block">
        <h2 class="sg-section-header">Block level elements</h2>

        <h3>Headings</h3>

        <h1>Header one</h1>
        <h2>Header two</h2>
        <h3>Header three</h3>
        <h4>Header four</h4>
        <h5>Header five</h5>
        <h6>Header six</h6>

        <h3>Blockquotes</h3>
        <p>Single line blockquote:</p>
        <blockquote><p>Stay hungry. Stay foolish.</p></blockquote>
        <p>Multi line blockquote with a cite reference:</p>
        <blockquote><p>People think focus means saying yes to the thing you’ve got to focus on. But that’s not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I’m actually as proud of the things we haven’t done as the things I have done. Innovation is saying no to 1,000 things. <cite>Steve Jobs – Apple Worldwide Developers’ Conference, 1997</cite></p></blockquote>
        <h2>Tables</h2>
        <table>
        <tbody>
        <tr>
        <th>Employee</th>
        <th class="views">Salary</th>
        <th></th>
        </tr>
        <tr class="odd">
        <td><a href="http://john.do/">John Saddington</a></td>
        <td>$1</td>
        <td>Because that’s all Steve Job’ needed for a salary.</td>
        </tr>
        <tr class="even">
        <td><a href="http://tommcfarlin.com/">Tom McFarlin</a></td>
        <td>$100K</td>
        <td>For all the blogging he does.</td>
        </tr>
        <tr class="odd">
        <td><a href="http://jarederickson.com/">Jared Erickson</a></td>
        <td>$100M</td>
        <td>Pictures are worth a thousand words, right? So Tom x 1,000.</td>
        </tr>
        <tr class="even">
        <td><a href="http://chrisam.es/">Chris Ames</a></td>
        <td>$100B</td>
        <td>With hair like that?! Enough said…</td>
        </tr>
        </tbody>
        </table>
        <h2>Definition Lists</h2>
        <dl>
        <dt>Definition List Title</dt>
        <dd>Definition list division.</dd>
        <dt>Startup</dt>
        <dd>A startup company or startup is a company or temporary organization designed to search for a repeatable and scalable business model.</dd>
        <dt>#dowork</dt>
        <dd>Coined by Rob Dyrdek and his personal body guard Christopher “Big Black” Boykins, “Do Work” works as a self motivator, to motivating your friends.</dd>
        <dt>Do It Live</dt>
        <dd>I’ll let Bill O’Reilly will <a title="We'll Do It Live" href="https://www.youtube.com/watch?v=O_HyZ5aW76c">explain</a> this one.</dd>
        </dl>
        <h2>Unordered Lists (Nested)</h2>
        <ul>
        <li>List item one
        <ul>
        <li>List item one
        <ul>
        <li>List item one</li>
        <li>List item two</li>
        <li>List item three</li>
        <li>List item four</li>
        </ul>
        </li>
        <li>List item two</li>
        <li>List item three</li>
        <li>List item four</li>
        </ul>
        </li>
        <li>List item two</li>
        <li>List item three</li>
        <li>List item four</li>
        </ul>
        <h2>Ordered List (Nested)</h2>
        <ol>
        <li>List item one
        <ol>
        <li>List item one
        <ol>
        <li>List item one</li>
        <li>List item two</li>
        <li>List item three</li>
        <li>List item four</li>
        </ol>
        </li>
        <li>List item two</li>
        <li>List item three</li>
        <li>List item four</li>
        </ol>
        </li>
        <li>List item two</li>
        <li>List item three</li>
        <li>List item four</li>
        </ol>

        Preformatted Tag
        <p>This tag styles large blocks of code.</p>
        <pre>.post-title {
          margin: 0 0 5px;
          font-weight: bold;
          font-size: 38px;
          line-height: 1.2;
        }</pre>

        Address Tag
        <address>1 Infinite Loop<br>
        Cupertino, CA 95014<br>
        United States</address>
        
        <h2>Inline Tags</h2>
        <p>Anchor Tag (aka. Link): This is an example of a <a title="Apple" href="http://apple.com">link</a>. Abbreviation Tag: The abbreviation <abbr title="Seriously">srsly</abbr> stands for “seriously”. Acronym Tag: The acronym <acronym title="For The Win">ftw</acronym> stands for “for the win”. Big Tag: These tests are a <big>big</big> deal, but this tag is no longer supported in HTML5. Cite Tag: “Code is poetry.” —<cite>Automattic</cite>. Code Tag: You will learn later on in these tests that <code>word-wrap: break-word;</code> will be your best friend. Delete Tag: This tag will let you <del>strikeout text</del>, but this tag is no longer supported in HTML5 (use the <code>&lt;strike&gt;</code> instead). Emphasize Tag: The emphasize tag should <em>italicize</em> text. Insert Tag: This tag should denote <ins>inserted</ins> text. Keyboard Tag: This scarsly known tag emulates <kbd>keyboard text</kbd>, which is usually styled like the <code>&lt;code&gt;</code> tag.
        
        Quote Tag: <q>Developers, developers, developers…</q> –Steve Ballmer. Strong Tag: This tag shows <strong>bold text.</strong> Subscript Tag: Getting our science styling on with H<sub>2</sub>O, which should push the “2” down. Superscript Tag: Still sticking with science and Albert Einstein’s&nbsp;E = MC<sup>2</sup>, which should lift the “2” up. Teletype Tag: This rarely used tag emulates <tt>teletype text</tt>, which is usually styled like the <code>&lt;code&gt;</code> tag. Variable Tag: This allows you to denote <var>variables</var>.</p>
      </section>

      <?php wp_link_pages(array('before' => __('Pages: ','properbear'), 'next_or_number' => 'number')); ?>
			<?php edit_post_link(__('Edit this entry','properbear'), '<p>', '</p>'); ?>
		</main>

		<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>