declare namespace Laravel {
  type MetaLink = {
    active: boolean;
    label: string;
    url: string | null;
  };

  interface Pagination<T> {
    data: T[];
    links: {
      first: string | null;
      last: string | null;
      next: string | null;
      prev: string | null;
    };
    meta: {
      current_page: number;
      from: number;
      last_page: number;
      links: MetaLink[];
      path: string;
      per_page: number;
      to: number;
      total: number;
    };
  }
}
