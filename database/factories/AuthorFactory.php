<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'name' => '',
            'biography' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function jkRowling(): static
    {
        return $this->state([
            'id' => 1,
            'name' => 'J.K. Rowling',
            'biography' => 'Joanne Rowling, better known by her pen name J. K. Rowling, is a British novelist, screenwriter, producer, and philanthropist. She is best known for writing the Harry Potter fantasy series, which has won multiple awards and sold more than 500 million copies, becoming the best-selling book series in history. The Harry Potter books have also been the basis for the popular film series of the same name, over which Rowling had overall approval on the scripts and was a producer on the final films. She has also written under the pen name Robert Galbraith.',
        ]);
    }

    public function michaelCrichton(): static
    {
        return $this->state([
            'id' => 2,
            'name' => 'Michael Crichton',
            'biography' => 'John Michael Crichton was an American author, screenwriter, and film director and producer best known for his work in the science fiction, thriller, and medical fiction genres. His books have sold over 200 million copies worldwide, and over a dozen have been adapted into films.',
        ]);
    }

    public function brandonSanderson(): static
    {
        return $this->state([
            'id' => 3,
            'name' => 'Brandon Sanderson',
            'biography' => 'Brandon Sanderson is an American fantasy and science fiction writer. He is best known for the Cosmere universe, in which most of his fantasy novels (most notably the Mistborn series and The Stormlight Archive) are set. He is also known for finishing Robert Jordan\'s epic fantasy series The Wheel of Time. Sanderson was raised in Lincoln, Nebraska before attending Brigham Young University, where he received degrees in English literature and creative writing.',
        ]);
    }

    public function jrrTolkien(): static
    {
        return $this->state([
            'id' => 4,
            'name' => 'J.R.R. Tolkien',
            'biography' => 'J.R.R. Tolkien was born on 3rd January 1892. After serving in the First World War, he became best known for The Hobbit and The Lord of the Rings, selling 150 million copies in more than 40 languages worldwide. Awarded the CBE and an honorary Doctorate of Letters from Oxford University, he died in 1973 at the age of 81.',
        ]);
    }

    public function suzanneCollins(): static
    {
        return $this->state([
            'id' => 5,
            'name' => 'Suzanne Collins',
            'biography' => 'Suzanne Collins is an American television writer and author. She is known as the author of The New York Times best-selling series The Underland Chronicles and The Hunger Games trilogy.',
        ]);
    }

    public function harperLee(): static
    {
        return $this->state([
            'id' => 6,
            'name' => 'Harper Lee',
            'biography' => 'Nelle Harper Lee was an American novelist widely known for To Kill a Mockingbird, published in 1960. Immediately successful, it won the 1961 Pulitzer Prize and has become a classic of modern American literature. Though Lee had only published this single book, in 2007 she was awarded the Presidential Medal of Freedom for her contribution to literature. Additionally, Lee received numerous honorary degrees, though she declined to speak on those occasions. She was also known for assisting her close friend Truman Capote in his research for the book In Cold Blood (1966). Capote was the basis for the character Dill in To Kill a Mockingbird.',
        ]);
    }

    public function arthurGolden(): static
    {
        return $this->state([
            'id' => 7,
            'name' => 'Arthur Golden',
            'biography' => 'Golden was born in Chattanooga, Tennessee, the son of Ruth (née Sulzberger) and Ben Hale Golden. His mother was Jewish and his father a gentile. Through his mother he is a member of the Ochs-Sulzberger family. His mother was a daughter of long-time Times publisher Arthur Hays Sulzberger and granddaughter of Times owner and publisher Adolph Ochs. His parents divorced when he was eight years old. His father died five years after. He was raised in Lookout Mountain, Georgia and attended Lookout Mountain Elementary School in Lookout Mountain, Tennessee. He spent his middle and high school years at the Baylor School (then a boys-only school for day and boarding students) in Chattanooga, graduating in 1974. He attended Harvard University and received a degree in art history, specializing in Japanese art. In 1980, he earned an M.A. in Japanese history at Columbia University, and also learned Mandarin Chinese. After a summer at Peking University in Beijing, China, he worked in Tokyo. When he returned to the United States, he earned an M.A. in English at Boston University. He currently lives in Brookline, Massachusetts.',
        ]);
    }

    public function oscarWilde(): static
    {
        return $this->state([
            'id' => 9,
            'name' => 'Oscar Wilde',
            'biography' => 'Oscar Fingal O\'Flahertie Wills Wilde was an Irish poet and playwright. After writing in different forms throughout the 1880s, he became one of London\'s most popular playwrights in the early 1890s. He is best remembered for his epigrams and plays, his novel The Picture of Dorian Gray, and the circumstances of his criminal conviction for "gross indecency", imprisonment, and early death at age 46.',
        ]);
    }

    public function markTwain(): static
    {
        return $this->state([
            'id' => 11,
            'name' => 'Mark Twain',
            'biography' => 'Samuel Langhorne Clemens, known by his pen name Mark Twain, was an American writer, humorist, entrepreneur, publisher, and lecturer. He was lauded as the "greatest humorist this country has produced", and William Faulkner called him "the father of American literature". His novels include The Adventures of Tom Sawyer (1876) and its sequel, the Adventures of Huckleberry Finn (1884), the latter often called "The Great American Novel".',
        ]);
    }

    public function sonaCharaipotra(): static
    {
        return $this->state([
            'id' => 12,
            'name' => 'Sona Charaipotra',
            'biography' => 'Sona Charaipotra is an American entertainment and lifestyle journalist. She is the and author of young adult fiction. She is best known for her YA lit column on Parade.com and her YA series Tiny Pretty Things.',
        ]);
    }

    public function dhonielleClayton(): static
    {
        return $this->state([
            'id' => 13,
            'name' => 'Dhonielle Clayton',
            'biography' => 'Dhonielle Clayton is the co-author of the Tiny Pretty Things series. She grew up in the Washington, DC suburbs on the Maryland side and spent most of her time under her grandmother\'s table with a stack of books. A former teacher and middle school librarian, Dhonielle is co-founder of CAKE Literary—a creative development company whipping up decidedly diverse books for a wide array of readers—and COO of the non-profit, We Need Diverse Books. She\'s got a serious travel bug and loves spending time outside of the USA, but makes her home in New York City, where she can most likely be found hunting for the best slice of pizza.',
        ]);
    }

    public function jayKristoff(): static
    {
        return $this->state([
            'id' => 14,
            'name' => 'Jay Kristoff',
            'biography' => 'Jay Kristoff is the #1 international, New York Times and USA Today bestselling author of THE NEVERNIGHT CHRONICLE, THE ILLUMINAE FILES and THE LOTUS WAR. He is the winner of six Aurealis Awards, an ABIA, has over half a million books in print and is published in over thirty five countries, most of which he has never visited. He is as surprised about all of this as you are. He is 6\'7 and has approximately 12,000 days to live.',
        ]);
    }

    public function amieKaufman(): static
    {
        return $this->state([
            'id' => 15,
            'name' => 'Amie Kaufman',
            'biography' => 'Amie Kaufman is a New York Times and internationally bestselling author of young adult fiction. Her multi-award winning work is slated for publication in over 30 countries, and is in development for film and TV. Raised in Australia and occasionally Ireland, Amie has degrees in history, literature, law and conflict resolution. She lives in Melbourne with her husband, their rescue dog, and an extremely large personal library.',
        ]);
    }
}
