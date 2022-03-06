declare namespace App {
  interface Artist {
    id: number;
    name: string;
    bio: string;
    website: string;
    slug: string;
    pic: string;
    albums_count?: number;
    genres: Genre[];
    created_at: string;
    updated_at: string;
  }

  interface Genre {
    id: number;
    name: string;
  }
}
