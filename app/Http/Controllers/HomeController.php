<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'hero' => [
                'title' => 'Transform Your Business with Premium Solutions',
                'subtitle' => 'Professional services that drive growth and innovation',
                'cta_text' => 'Get Started Today',
                'cta_link' => '#contact'
            ],
            'features' => [
                [
                    'icon' => 'fas fa-rocket',
                    'title' => 'Accelerated Growth',
                    'description' => 'Boost your business performance with our proven strategies'
                ],
                [
                    'icon' => 'fas fa-shield-alt',
                    'title' => 'Secure & Reliable',
                    'description' => 'Enterprise-grade security and 99.9% uptime guarantee'
                ],
                [
                    'icon' => 'fas fa-chart-line',
                    'title' => 'Analytics Driven',
                    'description' => 'Make informed decisions with comprehensive data insights'
                ],
                [
                    'icon' => 'fas fa-users',
                    'title' => 'Expert Support',
                    'description' => '24/7 professional support from our dedicated team'
                ]
            ],
            'services' => [
                [
                    'title' => 'Business Consulting',
                    'description' => 'Strategic guidance to optimize your operations and maximize growth potential',
                    'price' => 'Starting at $299/month'
                ],
                [
                    'title' => 'Digital Solutions',
                    'description' => 'Custom technology solutions tailored to your specific business needs',
                    'price' => 'Starting at $499/month'
                ],
                [
                    'title' => 'Analytics & Reporting',
                    'description' => 'Comprehensive data analysis and actionable insights for better decisions',
                    'price' => 'Starting at $199/month'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'Sarah Johnson',
                    'position' => 'CEO, TechVision Inc.',
                    'content' => 'Exceptional service and results. Our revenue increased by 40% in just 6 months.',
                    'rating' => 5
                ],
                [
                    'name' => 'Michael Chen',
                    'position' => 'Director, Growth Dynamics',
                    'content' => 'Professional team with deep expertise. They transformed our entire operation.',
                    'rating' => 5
                ],
                [
                    'name' => 'Emily Rodriguez',
                    'position' => 'Founder, InnovateLab',
                    'content' => 'Outstanding support and innovative solutions. Highly recommend their services.',
                    'rating' => 5
                ]
            ]
        ];

        return view('welcome', compact('data'));
    }
}