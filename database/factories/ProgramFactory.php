<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition(): array
    {
        return [
            'title' => 'Beginner',
            'slug'  => 'beginner',
            'description' => json_encode([
                "Introduction to financial markets and asset classes (stocks, forex, commodities, crypto)",
                "Understanding trading platforms and charting tools",
                "Basic technical and fundamental analysis",
                "Essential risk management techniques to protect your capital",
                "Developing a disciplined trading mindset to avoid common mistakes"
            ])
        ];
    }

    public function intermediate()
    {
        return $this->state([
            'title' => 'Intermediate',
            'slug'  => 'intermediate',
            'description' => json_encode([
                "Advanced technical analysis (chart patterns, indicators, price action)",
                "Trading psychology and emotional discipline to overcome fear and greed",
                "Strategy development and backtesting methods to refine your approach",
                "Risk-reward optimization and capital management techniques",
                "Live market analysis and trade execution strategies"
            ])
        ]);
    }

    public function advance()
    {
        return $this->state([
            'title' => 'Advance',
            'slug'  => 'advance',
            'description' => json_encode([
                "Algorithmic trading and automated strategies for efficiency",
                "Institutional-level risk management techniques",
                "In-depth fundamental and sentiment analysis for predictive trading",
                "Mastering different market conditions (trending, ranging, breakout)",
                "Personalized mentorship and real-time trade reviews for hands-on learning"
            ])
        ]);
    }
}
