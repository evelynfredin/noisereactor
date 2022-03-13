declare namespace App {
  interface Artist {
    id: number;
    name: string;
    bio: string;
    website: string;
    slug: string;
    pic: string;
    albums_count: number;
    albums: Album[];
    genres: Genre[];
    created_at: string;
    updated_at: string;
  }

  interface User {
    id: number;
    username: string;
    email: string;
  }

  interface Genre {
    id: number;
    name: string;
    artists_count: number;
  }

  interface Label {
    id: number;
    name: string;
    albums_count: number;
  }

  interface Album {
    id: number;
    title: string;
    artist: Artist;
    edition: string;
    label: Label;
    description: string;
    released_date: string;
    cover: string;
    review: Review;
    created_at: string;
    updated_at: string;
  }

  interface Review {
    id: number;
    album: Album;
    excerpt: string;
    content: string;
    is_published: boolean;
    created_at: string;
    updated_at: string;
  }

  interface Stat {
    id: number;
    stat: string;
    count: number;
  }
}
