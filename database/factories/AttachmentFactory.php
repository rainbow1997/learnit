<?php

namespace Database\Factories;

use App\Attachment\Attachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = App\Attachment\Attachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $attachmentable=[
            App\Attachment\ImageAttachment::class,
            App\Attachment\PdfAttachment::class,
            App\Attachment\MovieAttachment::class,
            App\Attachment\ArchiveAttachment::class,

        ];
        $attachmentable_type=$this->faker->randomElement($attachmentable);

        return [
            //
            'attachmentable_type'=>$attachmentable_type,
            'attachmentable_id'=>$this->faker->randomBetween(0,20),
            'describe'=>$this->faker->sentence(),
             'size'=>$this->faker->randomNumber(6,true),
            'created_at'=>$this->faker->now(),
            'status'=>$this->faker->boolean
        ];
    }
}
