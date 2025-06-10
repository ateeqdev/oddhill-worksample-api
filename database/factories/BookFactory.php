<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => '',
            'isbn' => '',
            'description' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function harryPotterChamberSecrets(): static
    {
        return $this->state([
            'id' => 1,
            'title' => 'Harry Potter and the Chamber of Secrets',
            'isbn' => '9781408855669',
            'description' => 'The Dursleys were so mean and hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he\'s packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike\n\nAnd strike it does. For in Harry\'s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor, Gilderoy Lockhart, a spirit named Moaning Myrtle who haunts the girls\' bathroom, and the unwanted attentions of Ron Weasley\'s younger sister, Ginny.\n\nBut each of these seem minor annoyances when the real trouble begins, and someone -- or something -- starts turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects . . . Harry Potter himself?',
        ]);
    }

    public function jurassicPark(): static
    {
        return $this->state([
            'id' => 2,
            'title' => 'Jurassic Park',
            'isbn' => '9780345538987',
            'description' => 'An astonishing technique for recovering and cloning dinosaur DNA has been discovered. Now humankind\'s most thrilling fantasies have come true. Creatures extinct for eons roam Jurassic Park with their awesome presence and profound mystery, and all the world can visit them—for a price.\n\nUntil something goes wrong. . . .\n\nIn Jurassic Park, Michael Crichton taps all his mesmerizing talent and scientific brilliance to create his most electrifying technothriller.',
        ]);
    }

    public function fantasticBeasts(): static
    {
        return $this->state([
            'id' => 3,
            'title' => 'Fantastic Beasts and Where to Find Them',
            'isbn' => '9781408708989',
            'description' => 'An approved textbook at Hogwarts School of Witchcraft and Wizardry since publication, Newt Scamander\'s masterpiece has entertained wizarding families through the generations. Fantastic Beasts and Where to Find Them is an indispensable introduction to the magical beasts of the Wizarding World. Scamander\'s years of travel and research have created a tome of unparalleled importance. Some of the beasts will be familiar to readers of the Harry Potter books - the Hippogriff, the Basilisk, the Hungarian Horntail ... Others will surprise even the most ardent amateur Magizoologist. This is an essential companion to the Harry Potter stories, and includes a new foreword from J.K. Rowling (writing as Newt Scamander) and six new beasts!',
        ]);
    }

    public function skyward(): static
    {
        return $this->state([
            'id' => 8,
            'title' => 'Skyward',
            'isbn' => '9781473217850',
            'description' => 'Defeated, crushed, and driven almost to extinction, the remnants of the human race are trapped on a planet that is constantly attacked by mysterious alien starfighters. Spensa, a teenage girl living among them, longs to be a pilot. When she discovers the wreckage of an ancient ship, she realizes this dream might be possible—assuming she can repair the ship, navigate flight school, and (perhaps most importantly) persuade the strange machine to help her. Because this ship, uniquely, appears to have a soul.',
        ]);
    }

    public function lordOfTheRings(): static
    {
        return $this->state([
            'id' => 9,
            'title' => 'The Lord of the Rings',
            'isbn' => '9780007525546',
            'description' => 'One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkness bind them\n\nIn ancient times the Rings of Power were crafted by the Elven-smiths, and Sauron, the Dark Lord, forged the One Ring, filling it with his own power so that he could rule all others. But the One Ring was taken from him, and though he sought it throughout Middle-earth, it remained lost to him. After many ages it fell by chance into the hands of the hobbit Bilbo Baggins.\n\nFrom Sauron\'s fastness in the Dark Tower of Mordor, his power spread far and wide. Sauron gathered all the Great Rings to him, but always he searched for the One Ring that would complete his dominion.\n\nWhen Bilbo reached his eleventy-first birthday he disappeared, bequeathing to his young cousin Frodo the Ruling Ring and a perilous quest: to journey across Middle-earth, deep into the shadow of the Dark Lord, and destroy the Ring by casting it into the Cracks of Doom.\n\nThe Lord of the Rings tells of the great quest undertaken by Frodo and the Fellowship of the Ring: Gandalf the Wizard; the hobbits Merry, Pippin, and Sam; Gimli the Dwarf; Legolas the Elf; Boromir of Gondor; and a tall, mysterious stranger called Strider.',
        ]);
    }

    public function theHobbit(): static
    {
        return $this->state([
            'id' => 10,
            'title' => 'The Hobbit',
            'isbn' => '9780261102217',
            'description' => 'In a hole in the ground there lived a hobbit. Not a nasty, dirty, wet hole, filled with the ends of worms and an oozy smell, nor yet a dry, bare, sandy hole with nothing in it to sit down on or to eat: it was a hobbit-hole, and that means comfort.\n\nWritten for J.R.R. Tolkien\'s own children, The Hobbit met with instant critical acclaim when it was first published in 1937. Now recognized as a timeless classic, this introduction to the hobbit Bilbo Baggins, the wizard Gandalf, Gollum, and the spectacular world of Middle-earth recounts of the adventures of a reluctant hero, a powerful and dangerous ring, and the cruel dragon Smaug the Magnificent. The text in this 372-page paperback edition is based on that first published in Great Britain by Collins Modern Classics (1998), and includes a note on the text by Douglas A. Anderson (2001). Unforgettable!',
        ]);
    }

    public function hungerGames(): static
    {
        return $this->state([
            'id' => 11,
            'title' => 'The Hunger Games',
            'isbn' => '9780439023481',
            'description' => 'Could you survive on your own, in the wild, with everyone out to make sure you don\'t live to see the morning?\n\nIn the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV. Sixteen-year-old Katniss Everdeen, who lives alone with her mother and younger sister, regards it as a death sentence when she is forced to represent her district in the Games. But Katniss has been close to dead before - and survival, for her, is second nature. Without really meaning to, she becomes a contender. But if she is to win, she will have to start making choices that weigh survival against humanity and life against love.\n\nNew York Times bestselling author Suzanne Collins delivers equal parts suspense and philosophy, adventure and romance, in this searing novel set in a future with unsettling parallels to our present.',
        ]);
    }

    public function toKillMockingbird(): static
    {
        return $this->state([
            'id' => 12,
            'title' => 'To Kill a Mockingbird',
            'isbn' => '9780446310789',
            'description' => 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.\n\nCompassionate, dramatic, and deeply moving, To Kill A Mockingbird takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.',
        ]);
    }

    public function memoirsOfGeisha(): static
    {
        return $this->state([
            'id' => 13,
            'title' => 'Memoirs of a Geisha',
            'isbn' => '9780739326220',
            'description' => 'A literary sensation and runaway bestseller, this brilliant debut novel presents with seamless authenticity and exquisite lyricism the true confessions of one of Japan\'s most celebrated geisha.\n\nIn Memoirs of a Geisha, we enter a world where appearances are paramount; where a girl\'s virginity is auctioned to the highest bidder; where women are trained to beguile the most powerful men; and where love is scorned as illusion. It is a unique and triumphant work of fiction - at once romantic, erotic, suspenseful - and completely unforgettable.',
        ]);
    }

    public function pictureOfDorianGray(): static
    {
        return $this->state([
            'id' => 14,
            'title' => 'The Picture of Dorian Gray',
            'isbn' => '9781847493729',
            'description' => 'Written in his distinctively dazzling manner, Oscar Wilde\'s story of a fashionable young man who sells his soul for eternal youth and beauty is the author\'s most popular work. The tale of Dorian Gray\'s moral disintegration caused a scandal when it ﬁrst appeared in 1890, but though Wilde was attacked for the novel\'s corrupting inﬂuence, he responded that there is, in fact, "a terrible moral in Dorian Gray." Just a few years later, the book and the aesthetic/moral dilemma it presented became issues in the trials occasioned by Wilde\'s homosexual liaisons, which resulted in his imprisonment. Of Dorian Gray\'s relationship to autobiography, Wilde noted in a letter, "Basil Hallward is what I think I am: Lord Henry what the world thinks me: Dorian what I would like to be—in other ages, perhaps."',
        ]);
    }

    public function adventuresOfHuckleberryFinn(): static
    {
        return $this->state([
            'id' => 15,
            'title' => 'The Adventures of Huckleberry Finn',
            'isbn' => '9780142437179',
            'description' => 'A nineteenth-century boy from a Mississippi River town recounts his adventures as he travels down the river with a runaway slave, encountering a family involved in a feud, two scoundrels pretending to be royalty, and Tom Sawyer\'s aunt who mistakes him for Tom.',
        ]);
    }

    public function tinyPrettyThings(): static
    {
        return $this->state([
            'id' => 16,
            'title' => 'Tiny Pretty Things',
            'isbn' => '9780062342409',
            'description' => 'Black Swan meets Pretty Little Liars in this soapy, drama-packed novel featuring diverse characters who will do anything to be the prima at their elite ballet school.\n\nGigi, Bette, and June, three top students at an exclusive Manhattan ballet school, have seen their fair share of drama. Free-spirited new girl Gigi just wants to dance—but the very act might kill her. Privileged New Yorker Bette\'s desire to escape the shadow of her ballet-star sister brings out a dangerous edge in her. And perfectionist June needs to land a lead role this year or her controlling mother will put an end to her dancing dreams forever.\n\nWhen every dancer is both friend and foe, the girls will sacrifice, manipulate, and backstab to be the best of the best.',
        ]);
    }

    public function auroraRising(): static
    {
        return $this->state([
            'id' => 18,
            'title' => 'Aurora Rising',
            'isbn' => '9781524720964',
            'description' => 'From the internationally bestselling authors of THE ILLUMINAE FILES comes an epic new science fiction adventure.\n\nThe year is 2380, and the graduating cadets of Aurora Academy are being assigned their first missions. Star pupil Tyler Jones is ready to recruit the squad of his dreams, but his own boneheaded heroism sees him stuck with the dregs nobody else in the Academy would touch…\n\nA cocky diplomat with a black belt in sarcasm\nA sociopath scientist with a fondness for shooting her bunkmates\nA smart-ass techwiz with the galaxy\'s biggest chip on his shoulder\nAn alien warrior with anger management issues\nA tomboy pilot who\'s totally not into him, in case you were wondering\n\nAnd Ty\'s squad isn\'t even his biggest problem—that\'d be Aurora Jie-Lin O\'Malley, the girl he\'s just rescued from interdimensional space. Trapped in cryo-sleep for two centuries, Auri is a girl out of time and out of her depth. But she could be the catalyst that starts a war millions of years in the making, and Tyler\'s squad of losers, discipline-cases and misfits might just be the last hope for the entire galaxy.\n\nThey\'re not the heroes we deserve. They\'re just the ones we could find. Nobody panic.',
        ]);
    }
}
