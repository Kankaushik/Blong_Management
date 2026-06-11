<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add 5 highly professional mock posts
        Blog::create([
            'title' => 'SSC CGL Admit Card 2026 Out, Direct Link to Download Tier-1 Hall Ticket',
            'category' => 'Admit Card',
            'short_description' => 'The Staff Selection Commission has officially released the SSC CGL Admit Card 2026. Registered candidates can check the direct link and step-by-step guide to download their Tier-1 Hall Ticket online.',
            'content' => '<p><strong>SSC CGL Admit Card 2026 Released:</strong> The Staff Selection Commission (SSC) has officially activated the download links for the Combined Graduate Level (CGL) examination admit cards. Candidates who have registered for the CGL Tier-1 exam can now access their region-wise hall tickets from the official website or the direct links provided below.</p><p>The CGL Tier-1 exam is scheduled to take place in multiple sessions across India. It is mandatory for candidates to carry a printed copy of their admit card along with a valid photo ID card to the exam center.</p>',
            'published_date' => '2026-06-10',
            'image' => ''
        ]);

        Blog::create([
            'title' => 'UPSC Civil Services Preliminary Result 2026 Merit List PDF Download',
            'category' => 'Result',
            'short_description' => 'Union Public Service Commission (UPSC) has declared the results for Civil Services Prelims 2026. Download the PDF containing the roll numbers of successful candidates.',
            'content' => '<p><strong>UPSC CSE Prelims Result 2026 declared:</strong> The Union Public Service Commission has announced the results of the Civil Services Preliminary Examination 2026. The results are available in a PDF document listing the roll numbers of all qualifying candidates who will now proceed to the Mains examination.</p>',
            'published_date' => '2026-06-08',
            'image' => ''
        ]);

        Blog::create([
            'title' => 'RRB NTPC Recruitment 2026 Notification Out for 11,500+ Graduate & Under-Graduate Posts',
            'category' => 'Jobs',
            'short_description' => 'Railway Recruitment Boards (RRB) has released the detailed notification for NTPC recruitment. Apply online for Non-Technical Popular Categories vacancies before the closing date.',
            'content' => '<p><strong>Railway NTPC Job Openings:</strong> The Indian Railways has published the official notification for over 11,500 NTPC posts, including Junior Clerks, Station Masters, Goods Guards, and Commercial Apprentices. Registration starts next week.</p>',
            'published_date' => '2026-06-05',
            'image' => ''
        ]);

        Blog::create([
            'title' => 'CSIR NET Answer Key 2026 Released, Raise Objections by June 15',
            'category' => 'Answer Key',
            'short_description' => 'National Testing Agency (NTA) has uploaded the provisional answer key for CSIR UGC NET 2026 exam. Access response sheet and direct link here.',
            'content' => '<p><strong>CSIR UGC NET Answer Sheet Out:</strong> Candidates who appeared in the joint CSIR-UGC NET exam can now download the provisional answer key and their response sheets. Objections can be raised till June 15 by paying the prescribed fee.</p>',
            'published_date' => '2026-06-11',
            'image' => ''
        ]);

        Blog::create([
            'title' => 'UGC NET Exam Center City Intimation Slip 2026 Download Link Active',
            'category' => 'Information',
            'short_description' => 'Get the direct link to check your exam city allocation slip for UGC NET 2026. Learn the steps to download city slip before the admit card release.',
            'content' => '<p><strong>UGC NET City Intimation Slip:</strong> The National Testing Agency (NTA) has released the UGC NET exam city intimation slip 2026. Candidates are advised to check their allotted exam venue city to plan their travel early.</p>',
            'published_date' => '2026-06-09',
            'image' => ''
        ]);
    }
}
