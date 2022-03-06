declare namespace App {
  interface Artist {
    id: number;
    name: string;
    bio: string;
    website: string;
    slug: string;
    pic: string;
    albums_count: number;
    genres: Genre[];
    created_at: string;
    updated_at: string;
  }

  interface Genre {
    id: number;
    name: string;
  }

  interface Label {
    id: number;
    name: string;
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
    created_at: string;
    updated_at: string;
  }
}
