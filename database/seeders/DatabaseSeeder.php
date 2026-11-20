<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Praktikan',
            'email' => 'praktikan@example.com',
        ]);

        $articles = [
            [
                'title' => 'Why Clean Architecture Matters in Modern Web Development',
                'body' => "As web applications grow in complexity, maintaining a clear separation of concerns becomes essential for long-term sustainability. Clean Architecture organizes code into distinct layers—presentation, business logic, and data access—so that changes in one layer do not break the rest of the system.\n\nIn frameworks like Laravel, following conventions such as thin controllers, dedicated form requests, and well-defined Eloquent relationships keeps codebases readable and testable. Teams that invest early in clean structure spend significantly less time debugging regressions and onboarding new developers.\n\nUltimately, good architecture is not about over-engineering small projects; it is about making intentional decisions today that keep tomorrow's features easy to build.",
            ],
            [
                'title' => 'Practical Strategies to Prevent N+1 Query Bottlenecks in Laravel',
                'body' => "One of the most common performance issues in database-driven web applications is the N+1 query problem. It occurs when an application executes one query to fetch a list of records and then runs an additional query for each record to load a related model.\n\nUsing eager loading via Eloquent's with() method resolves this bottleneck by retrieving all required relationships in just two optimized SQL queries. For example, loading articles alongside their authors ensures constant query counts whether a page displays ten posts or a thousand.\n\nDevelopers can further protect production apps by enabling Model::preventLazyLoading() during local development, turning hidden performance traps into immediate, actionable feedback.",
            ],
            [
                'title' => 'Designing Accessible and Readable Typography for Editorial Websites',
                'body' => "Great content deserves typography that respects the reader's time and attention. On news portals and technical blogs, readability depends heavily on line length, contrast ratio, and vertical rhythm rather than decorative visual effects.\n\nKeeping body paragraphs between 60 and 75 characters per line prevents eye fatigue, while a line height of 1.6 gives text room to breathe across desktop and mobile screens. Pairing a crisp geometric sans-serif for headings with a neutral humanist typeface for body copy creates natural visual hierarchy.\n\nWhen typography is thoughtfully calibrated, readers focus effortlessly on the ideas being communicated rather than fighting the interface.",
            ],
            [
                'title' => 'How Artificial Intelligence Is Reshaping Software Engineering Workflows',
                'body' => "Artificial intelligence has rapidly evolved from an experimental novelty into an everyday collaborator for software engineers. Modern coding assistants accelerate boilerplate generation, suggest edge-case unit tests, and help developers navigate unfamiliar codebases in minutes.\n\nHowever, higher code generation speed also raises the bar for human judgment. Engineers must carefully review generated logic for subtle security flaws, architectural drift, and maintainability issues before merging changes into production.\n\nThe most effective developers treat AI as a force multiplier—using it to automate repetitive tasks while dedicating their own focus to system design, domain modeling, and user empathy.",
            ],
            [
                'title' => 'Understanding Role-Based Access Control and Ownership Authorization',
                'body' => "Authentication verifies who a user is, whereas authorization determines what that user is permitted to do. Relying solely on hiding edit or delete buttons in the user interface leaves applications vulnerable to direct HTTP requests.\n\nEnforcing ownership checks on the server side—such as verifying that the authenticated user's ID matches the article's user_id before permitting updates—ensures robust protection against unauthorized tampering. Returning a standard HTTP 403 Forbidden response clearly communicates access boundaries.\n\nCombining clean middleware routing with strict controller-level authorization creates defense in depth for multi-user platforms.",
            ],
            [
                'title' => 'The Shift Toward Edge Computing and Low-Latency Web Experiences',
                'body' => "Users expect web pages to load almost instantaneously, regardless of where they are located in the world. Traditional centralized server architectures often introduce noticeable latency when requests travel thousands of kilometers to a single data center.\n\nEdge computing addresses this challenge by executing caching, authentication checks, and lightweight logic on servers distributed closer to end users. Static assets and frequently read articles can be served within milliseconds from nearby edge nodes.\n\nAs global internet traffic continues to grow, combining efficient backend caching with edge delivery is becoming the standard blueprint for resilient, high-speed web platforms.",
            ],
            [
                'title' => 'Building Resilient RESTful APIs: Validation, Versioning, and Clarity',
                'body' => "A well-crafted API acts as a reliable contract between backend services and client applications. Predictable resource naming, consistent HTTP status codes, and descriptive validation error messages dramatically reduce integration friction.\n\nValidating every incoming payload at the boundary protects database integrity and prevents malformed data from propagating deeper into application logic. Equally important is planning for evolution through non-breaking changes or explicit API versioning.\n\nWhen APIs are designed with empathy for the developers who consume them, ecosystems flourish and maintenance costs drop.",
            ],
            [
                'title' => 'Sustainable Open-Source Software and the Developers Behind It',
                'body' => "Modern digital infrastructure rests heavily on open-source libraries, frameworks, and developer tools maintained by communities around the globe. From web frameworks to database drivers, open collaboration accelerates innovation across every industry.\n\nYet many critical open-source projects rely on a small group of volunteer maintainers balancing full-time jobs with issue triage and security patches. Supporting these ecosystems through documentation improvements, thoughtful bug reports, or organizational sponsorship strengthens the entire software supply chain.\n\nHealthy open-source communities thrive when organizations view themselves not merely as consumers, but as active stewards.",
            ],
            [
                'title' => 'Cybersecurity Fundamentals Every Web Developer Should Practice Daily',
                'body' => "Security cannot be treated as a final checklist item right before deployment; it must be woven into everyday coding habits. Common vulnerabilities such as Cross-Site Scripting (XSS), SQL injection, and Cross-Site Request Forgery (CSRF) remain prevalent when basic safeguards are overlooked.\n\nModern frameworks provide built-in protections—automatic output escaping in Blade templates, parameterized queries in Eloquent, and CSRF tokens on state-changing forms—but developers must understand how and why they work.\n\nKeeping dependencies updated, validating user input strictly, and following the principle of least privilege form the bedrock of trustworthy web applications.",
            ],
            [
                'title' => 'Why Technical Writing Is an Essential Skill for Software Developers',
                'body' => "Writing clear documentation, architecture decision records, and technical articles is one of the highest-leverage habits a developer can cultivate. Explaining a complex concept in plain language forces you to verify your own understanding and uncover hidden assumptions.\n\nInside engineering teams, thorough written communication reduces unnecessary meetings and preserves institutional knowledge long after a project ships. Publicly, sharing well-structured tutorials and post-mortems helps fellow learners solve real problems faster.\n\nStrong code builds systems, but clear writing aligns the people who maintain and evolve them.",
            ],
            [
                'title' => 'Database Indexing Explained: How B-Trees Accelerate Read Queries',
                'body' => "When a database table grows from hundreds of rows to millions, unindexed queries can quickly degrade from milliseconds to several seconds. Without an index, the database engine must perform a full table scan to locate matching records.\n\nAdding indexes to frequently queried columns—such as unique slugs, foreign keys, and timestamps used for sorting—allows the database to locate rows rapidly using balanced tree structures. However, each index also adds slight overhead to insert and update operations.\n\nAnalyzing real query execution plans helps developers strike the right balance between blazing-fast reads and efficient writes.",
            ],
            [
                'title' => 'From Local Prototype to Production: Essential Deployment Practices',
                'body' => "Transitioning a web application from a local development environment to a live production server requires careful preparation. Configuration values such as database credentials, application keys, and debug flags must be strictly managed through environment variables.\n\nDisabling debug mode in production prevents sensitive stack traces from being exposed to visitors, while caching routes, views, and configuration files maximizes response speed. Automated backups and health monitoring ensure teams can recover swiftly from unexpected outages.\n\nA disciplined deployment checklist turns release day from a stressful event into a routine, repeatable process.",
            ],
        ];

        foreach ($articles as $index => $item) {
            Article::create([
                'user_id' => $user->id,
                'title' => $item['title'],
                'slug' => Str::slug($item['title']) . '-' . Str::lower(Str::random(6)),
                'body' => $item['body'],
                'image' => null,
                'created_at' => now()->subHours(count($articles) - $index),
                'updated_at' => now()->subHours(count($articles) - $index),
            ]);
        }
    }
}